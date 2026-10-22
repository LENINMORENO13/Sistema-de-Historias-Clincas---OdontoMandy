# 🦷 DentalManager (OdontoMandy)

> **Estado: en pausa / archivado.** El proyecto no recibe mantenimiento.
> Se conserva como documentación del estado del arte en su momento y como
> punto de partida del proyecto que sigo: **[OpsMind](#-continua-en-opsmind)**.

Sistema de gestión para clínicas odontológicas: registro de pacientes,
historia clínica, odontograma digital y reportes en PDF.

[![Estado](https://img.shields.io/badge/Estado-En%20pausa%20%26%20archivado-d4a373)](https://github.com/LENINMORENO13/Sistema-de-Historias-Clincas---OdontoMandy)
[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.x-blue?style=for-the-badge&logo=php)](https://codeigniter.com/)
[![PHP](https://img.shields.io/badge/PHP-8.1%2B-purple?style=for-the-badge&logo=php)](https://www.php.net/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](./LICENSE)

---

## ⚠️ Aviso de seguridad

Este proyecto **se enlazó en producción sin control de acceso real**. Durante
su desarrollo el login no persistía la sesión, por lo que cualquier persona
con la URL podía leer y modificar los historiales clínicos.

El cierre (ver [parche de seguridad](#-parche-de-seguridad-del-cierre)) añadió
sesión por usuario, control de roles, logout real y limitador de intentos de
acceso. Aun así:

- **No ingreses datos reales de pacientes.** Es una demostración con datos
  ficticios.
- La demo pública expone credenciales de prueba a propósito. Trátala como tal.
- El esquema SQL original **no estaba versionado**: lo que hay en
  [`database/`](./database) fue reconstruido a partir del código. Contrástalo
  contra tu base antes de confiar en él.

Si necesitas un sistema clínico real, usa uno con control de acceso auditado.

---

## 🧭 Por qué se pausó

No fue un fallo técnico. Fue un **desajuste de problema**.

El proyecto nació para digitalizar el historial clínico en papel de una
clínica. La odontóloga que lo iba a usar decidió **seguir con su método de
papel** y descartó el sistema.

La lección fue incómoda pero clara: **construí la solución correcta para un
problema que esa persona no tenía.** Un consultorio de un solo profesional con
pocos pacientes al día no tiene un problema de gestión de historias clínicas;
tiene un problema de agenda. El sistema no se caía: resolvía algo que no
dolía.

Y antes de eso: validé tarde. Cuando el sistema ya estaba completo, la
primera conversación sobre el flujo real de trabajo ocurrió después del
rechazo. Si esa conversación hubiera ocurrido antes, el alcance habría sido
otro.

Lo que sí dejó el proyecto es una lección de producto que ahora aplico en
todo lo demás: **el flujo de trabajo del usuario es la variable crítica, no
la tecnología.** Reescribir el backend en otro lenguaje no cambia ese
resultado.

---

## ✅ Lo que sí funcionaba

- **Pacientes y casos clínicos**: alta, búsqueda por nombre / cédula / fecha.
- **Odontograma digital** con estado por pieza (presente, ausente, caries,
  restauración, extracción).
- **Historia clínica**: diagnósticos, tratamientos e indicaciones por
  entrada, con historial por paciente.
- **Reportes PDF** con TCPDF: consolidado de clínica e individual por paciente.
- **Dashboard** con métricas de actividad.
- **Despliegue en producción** (AlwaysData) con control de versiones.

Stack: CodeIgniter 4, PHP 8.1+, MySQL, TCPDF, Bootstrap 5, Git/GitHub.

---

## ⚠️ Limitaciones conocidas

Lo que encontré al revisar el proyecto antes de archivarlo. No se corrigió
porque el proyecto no se retomó:

| Área | Problema |
|---|---|
| Autenticación | El login no guardaba sesión: todas las rutas eran públicas *(corregido en el cierre)* |
| Esquema de BD | Sin migraciones ni dump versionado *(reconstruido en `database/`)* |
| Submódulo | `app/ThirdParty/tcpdf` estaba registrado sin `.gitmodules`: un clone limpio rompía los PDF *(corregido en el cierre)* |
| Credenciales | `test.php` y `.env` estaban commiteados con credenciales reales *(corregido en el cierre)* |
| Roles | `rol` se guardaba pero nunca se leía *(corregido en el cierre)* |
| Pruebas | Solo los ejemplos del framework, cero cobertura de negocio |
| Modelo de datos | El odontograma es un JSON en una columna: no es consultable por SQL |
| XSS | Varias vistas imprimían datos de paciente sin `esc()` |
| Calidad | Vistas de 24 KB con lógica embebida, un único modelo "god model" |

---

## 🔐 Parche de seguridad del cierre

Cambios aplicados en el último commit (octubre 2026) antes de archivar el
repositorio:

- **Sesión real**: el login ahora guarda el usuario y regenera el ID de sesión.
- **Filtro de autenticación** global (`app/Filters/AuthFilter.php`): todas las
  rutas exigen sesión iniciada.
- **Control de roles**: `app/Filters/AdminFilter.php` restringe el alta de
  usuarios a administradores, y el `rol` se valida contra una lista en servidor.
- **Logout real** y verificación de correo duplicado al registrar usuarios.
- **Limitador de fuerza bruta**: 5 intentos fallidos → 5 minutos de bloqueo.
- **Ruta `/test` eliminada** (filtraba el estado de la conexión a la BD).
- **Aviso visible** en todas las páginas: los datos son ficticios.
- **`.gitmodules` restaurado** para que el clone con submódulos funcione.
- **Credenciales expuestas retiradas** del repositorio y del historial.

---

## 🚀 Cómo ejecutarlo

```bash
git clone --recursive https://github.com/LENINMORENO13/Sistema-de-Historias-Clincas---OdontoMandy.git
cd Sistema-de-Historias-Clincas---OdontoMandy

cp .env.example .env      # ajusta las credenciales de MySQL
composer install

# base de datos
mysql -u root -p < database/schema.sql
mysql -u root -p < database/stored-procedures.sql
mysql -u root -p < database/seed.sql
```

Copia la carpeta a `htdocs` de XAMPP y ábrela por Apache:

```text
http://localhost/SisOdontoMandy/
```

> El front controller está en la **raíz** (`index.php`), no en `public/`.
> Por eso `php spark serve` y `php -S -t public` **no funcionan**: esperan un
> `public/index.php` que aquí no existe. Se sirve con Apache usando el
> `.htaccess` de la raíz (o cualquier servidor con `mod_rewrite`).

Credenciales de la demo: `admin@gmail.com` / `admin123`

> `--recursive` es necesario: TCPDF vive en `app/ThirdParty/tcpdf` como
> submódulo.

---

## 📁 Estructura

```plaintext
SisOdontoMandy/
├── app/
│   ├── Config/          → Configuración del framework (rutas, filtros, sesión)
│   ├── Controllers/     → Home (login), CCasos, Reportes, CAdmin
│   ├── Filters/         → AuthFilter, AdminFilter
│   ├── Models/          → ModeloGeneral (acceso a datos + SP)
│   └── Views/           → Interfaces de usuario
├── database/            → schema.sql, stored-procedures.sql, seed.sql
├── index.php            → Front controller (la raíz es el punto de entrada)
├── public/              → Assets estáticos (css, js)
└── system/              → Core de CodeIgniter 4
```

---

## 💡 Lo que aprendí

- **El flujo de trabajo manda.** La tecnología es reemplazable; la forma en la
  que el usuario trabaja no lo es.
- **Validar antes de construir.** Una conversación de 30 minutos con el
  usuario final evita meses de trabajo sobre un problema inexistente.
- **Un login que no autentica no es un login.** La sensación de "está
  protegido" y la protección real son cosas distintas, y solo una se nota
  cuando falla.
- **El esquema de datos es parte del producto.** Lo que no está versionado
  (migraciones, SP, dumps) no se puede mantener ni entregar a nadie.
- **La seguridad se hereda del esqueleto**, no se agrega al final: si el
  framework te da filtros de sesión y CSRF y no los usas, el proyecto nace
  con un agujero que nadie ve hasta que lo explotan.

---

## ➡️ Continúa en OpsMind

Esto es donde terminó el proyecto: **[OpsMind](https://github.com/LENINMORENO13/OpsMind)**,
plataforma de observabilidad de microservicios con análisis de incidentes
asistido por IA.

| | DentalManager | OpsMind |
|---|---|---|
| Stack | PHP / CodeIgniter 4 | TypeScript / Express / Prisma / React |
| Autenticación | Sesión simple *(añadida al cerrar)* | JWT, roles, rate limiting, Helmet |
| Esquema de BD | Sin versionar *(reconstruido)* | 10 migraciones Prisma |
| Pruebas | Ninguna | 14 suites (security, SSRF, incidents, IA…) |
| CI/CD | Manual | GitHub Actions con despliegue continuo |
| Entorno | XAMPP + FTP | Docker + Compose + Render |

Todo lo que este proyecto me enseñó a hacer mal está corregido ahí.

---

## 📬 Contacto

- **GitHub:** [LENINMOREN013](https://github.com/LENINMOREN013)
- **Email:** mlenin922@gmail.com
- **LinkedIn:** [Lenin Moreno](https://www.linkedin.com/in/lenin-moreno/)
