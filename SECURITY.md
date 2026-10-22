# Política de seguridad

## Estado del proyecto

Este repositorio está **archivado y en pausa**. No recibe mantenimiento ni
correcciones de seguridad. Úsalo como material de estudio, no en producción.

## Reportar un problema

Si encuentras una vulnerabilidad en este código, puedes abrir una issue
pública en el repositorio. No hay canal privado de reporte porque no hay
equipo que lo atienda.

## Contexto importante

El proyecto se desarrolló y se enlazó en producción **sin control de acceso
real**: el login no persistía la sesión, por lo que todas las rutas eran
accesibles sin credenciales. Además, el historial de git contiene credenciales
de base de datos que fueron retiradas en el commit de cierre.

Esto se corrigió en el parche de cierre (ver `README.md`):

- Sesión por usuario con regeneración de ID de sesión
- Filtro de autenticación global (`app/Filters/AuthFilter.php`)
- Filtro de rol administrador (`app/Filters/AdminFilter.php`)
- Logout real y limitador de fuerza bruta
- Validación de rol en servidor y verificación de correo duplicado

## Limitaciones que persisten

- **No hay auditoría de accesos.** No hay registro de quién consultó o
  modificó una historia clínica.
- **No hay cifrado de datos sensibles** a nivel de columna. Las historias
  clínicas se guardan en claro en MySQL.
- **Los roles no se aplican a nivel de dato.** El filtro de administrador
  protege el alta de usuarios, pero un rol `odontologo` ve todos los
  pacientes, no solo los suyos.
- **No hay respaldos ni exportación de datos.**
- **El esquema SQL es una reconstrucción** hecha a partir del código, no el
  original. Contrástalo antes de usarlo.

## Si vas a desplegar esto

No lo despliegues con datos reales de pacientes. Si aun así lo haces:

1. Genera una clave de cifrado real (`encryption.key`) y guárdala fuera del
   repositorio.
2. Cambia la contraseña del usuario `admin` de la demo y borra los datos de
   `database/seed.sql`.
3. Sirve la aplicación solo por HTTPS (`forceGlobalSecureRequests`).
4. Añade respaldos automáticos de la base de datos.
5. Revisa `app/Config/Security.php` y `app/Config/Session.php` antes de
   exponerlo a internet.
