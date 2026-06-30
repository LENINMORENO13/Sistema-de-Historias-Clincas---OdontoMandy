# 🦷 DentalManager

## Sistema de Gestión Integral para Clínicas Odontológicas

[![Estado](https://img.shields.io/badge/Estado-Desplegado%20%26%20Operativo-success?style=for-the-badge)](https://dentalmanager.alwaysdata.net/)
[![Demo](https://img.shields.io/badge/Demo-Ver%20en%20Vivo-blue?style=for-the-badge&logo=google-chrome)](https://dentalmanager.alwaysdata.net/)
[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.x-blue?style=for-the-badge&logo=php)](https://codeigniter.com/)
[![PHP](https://img.shields.io/badge/PHP-8.1%2B-purple?style=for-the-badge&logo=php)](https://www.php.net/)

---

### 🌐 ¡PRUÉBALO AHORA!

El sistema está desplegado y **abierto para pruebas públicas**. No necesitas instalar nada.

👉 **https://dentalmanager.alwaysdata.net/**

**🔑 Demo Login (Acceso rapido):**

**Email**: admin@gmail.com
**Password**: admin123

> ⚠️ **Aviso:** Este es un entorno de demostración. Por favor, **no ingreses información confidencial real** de pacientes. Los datos aquí son ficticios con fines educativos.

---

### 🎯 En una frase

DentalManager es un sistema web completo que automatiza la gestión de pacientes, tratamientos y reportes en clínicas dentales, reduciendo el tiempo de administración y mejorando la atención al paciente.

---

### 🚀 ¿Por qué importa este proyecto?

Las clínicas odontológicas tradicionales enfrentan desafíos diarios:

- **Pérdida de tiempo** en papeleo y registros manuales.
- **Desorganización** de historiales médicos.
- **Dificultad** para generar reportes y estadísticas.
- **Sin acceso centralizado** a la información de pacientes.

**DentalManager resuelve estos problemas** proporcionando una plataforma digital centralizada, segura y accesible desde cualquier lugar.

---

### 📊 Impacto del proyecto

| Métrica | Antes | Después |
|---------|-------|---------|
| Tiempo en registrar un paciente | 15-20 min | **2-3 min** |
| Búsqueda de historiales | 5-10 min | **Instantáneo** |
| Generación de reportes | Manual (horas) | **Automatizado (segundos)** |
| Acceso a estadísticas | No disponible | **En tiempo real** |

---

### ✨ Características principales

#### 1️⃣ Gestión completa de pacientes
- Registro digital de datos personales.
- Historial médico completo.
- Búsqueda rápida y filtrada.

#### 2️⃣ Casos clínicos especializados
- Documentación estructurada de tratamientos.
- Motivo de consulta y antecedentes.
- Estado del caso (en progreso, completado, derivado).

#### 3️⃣ Odontograma digital
- Visualización gráfica del estado dental.
- Registro de piezas presentes y ausentes.
- Marcas visuales por condición (caries, restauración, extracción).

#### 4️⃣ Historias clínicas detalladas
- Diagnósticos precisos.
- Tratamientos realizados con descripciones.
- Indicaciones post-tratamiento.

#### 5️⃣ Reportería inteligente
- Reportes individuales por paciente (PDF).
- Reportes consolidados de la clínica.
- Exportación de datos para análisis.

#### 6️⃣ Panel de control (Dashboard)
- Resumen de actividad diaria.
- Métricas clave de la clínica.
- Vista rápida de pacientes recientes.

#### 7️⃣ Seguridad
- Autenticación segura con sesiones.
- Datos encriptados.
- Registro abierto para nuevos doctores (Modo Demo).

---

### 📸 Galería del Sistema

Una vista rápida a las funcionalidades principales de Dental Manager:

| **Acceso y Control** | **Gestión Clínica** |
|:---:|:---:|
| **Inicio de Sesión Seguro**<br>![Login](Img/login.png) | **Panel de Control (Dashboard)**<br>![Dashboard](Img/dashboard.png) |

| **Corazón del Sistema** | **Historia Clínica** |
|:---:|:---:|
| **Odontograma Interactivo**<br>![Odontograma](Img/odontograma.png) | **Gestión de Casos**<br>![Casos](Img/gestion_casos.png) |

| **Potencia y Resultados** | **Herramientas** |
|:---:|:---:|
| **Reportes Profesionales PDF**<br>![Reporte](Img/reporte_pdf.png) | **Búsqueda Avanzada**<br>![Búsqueda](Img/busqueda_avanzada.png) |

---

### 🛠️ Stack tecnológico

```text
Frontend:       HTML5, CSS3, JavaScript (Bootstrap 5)
Backend:        PHP 8.1+
Framework:      CodeIgniter 4
Database:       MySQL (MariaDB)
Despliegue:     AlwaysData Cloud
Control:        Git/GitHub
```

---

### 🧠 Habilidades demostradas

#### Backend & Cloud
- ✅ Despliegue en Producción: Configuración de entorno real en AlwaysData.
- ✅ Optimización: Ajuste de rutas y assets para entornos web.
- ✅ Seguridad: Manejo de sesiones y sanitización en la nube.
- ✅ MVC: Arquitectura escalable y mantenible.
- ✅ Desarrollo de APIs: Controladores RESTful para consumo interno.

#### Frontend
- ✅ Diseño Responsive: Adaptable a móviles y escritorio.
- ✅ Integración de librerías: Uso de herramientas para generación de PDF y gráficos dinámicos.
- ✅ UX/UI: Diseño intuitivo enfocado en usuarios no técnicos.

#### Base de datos
- ✅ Stored Procedures: Lógica de negocio encapsulada en la BD para reportes rápidos.
- ✅ Relaciones complejas: Diseño relacional normalizado.
- ✅ Consultas optimizadas: Joins eficientes para grandes volúmenes de datos.

---

### 📁 Estructura del proyecto

```plaintext
SisOdontoMandy/
├── app/
│   ├── Config/          → Configuraciones del framework
│   ├── Controllers/     → Lógica de negocio (Home, CCasos, Reportes)
│   ├── Models/          → Acceso a datos y Stored Procedures
│   ├── Views/           → Interfaces de usuario
│   └── Helpers/         → Funciones utilitarias
├── public/              → Raíz del servidor web
│   ├── css/             → Estilos personalizados
│   ├── js/              → Lógica de cliente
│   └── assets/          → Recursos estáticos
└── system/              → Core de CodeIgniter 4
```

---

### 🔑 Módulos principales

| Módulo | Archivo clave | Descripción |
|--------|--------------|------------|
| Login | Home.php | Autenticación de usuarios |
| Dashboard | VistaDashboard.php | Panel principal |
| Pacientes | VistaRegistro.php | Registro de pacientes |
| Casos | CCasos.php + VistaCC.php | Gestión de casos clínicos |
| Odontograma | VistaSelectCasos.php | Visualización dental |
| Reportes | Reportes.php | Generación de informes |
| Admin | CAdmin.php | Administración del sistema |

---

### 💡 Lo que aprendí

- Diseñar soluciones reales: Entender necesidades de usuarios y traducirlas en funcionalidades.
- Arquitectura escalable: Aplicar patrones como MVC para proyectos mantenibles.
- Seguridad primero: Implementar protecciones contra vulnerabilidades comunes.
- Despliegue real: Llevar un proyecto local a un entorno de nube productivo.
- Gestión de proyecto: Planificar, ejecutar y entregar un sistema completo.


### 📬 Contacto

¿Interesado en el proyecto o en trabajar juntos?

- **GitHub:** [LENINMOREN013](https://github.com/LENINMOREN013)
- **Email:** mlenin922@gmail.com
- **LinkedIn:** [Lenin Moreno](https://www.linkedin.com/in/lenin-moreno/)
