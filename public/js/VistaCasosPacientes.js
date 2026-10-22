const form = document.querySelector('#search-form');
const btn = document.querySelector('#btn-limpiar');
const spinner = document.querySelector('#buscando-spinner');
let timeout;

btn.addEventListener('click', () => {
    form.reset();
    form.dispatchEvent(new Event('input')); // Disparar evento para actualizar resultados inmediatamente
})



form.addEventListener('input', async (e) => {
    e.preventDefault();

    clearTimeout(timeout);

    spinner.classList.remove('d-none');

    timeout = setTimeout(async () => {
        try {
            const nombre = form.elements.buscar_caso_nombre.value;
            const cedula = form.elements.buscar_caso_cedula.value;
            const fecha = form.elements.buscar_caso_fecha.value;
            const config = {
                params: {
                    buscar_caso_nombre: nombre,
                    buscar_caso_cedula: cedula,
                    buscar_caso_fecha: fecha
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            };
            const res = await axios.get('CasosPacientes', config);
            makeRows(res.data)
        } catch (error) {
            console.error('Error al buscar casos:', error);
            alert('Hubo un error al realizar la busqueda. Intente nuevamente')
        }finally{
            spinner.classList.add('d-none');
        }
    }, 500);

})

const makeRows = async (casos) => {
    const tabla = document.querySelector('#tabla-resultados');
    const contador = document.querySelector('#contador');
    const mensajeVacio = document.querySelector('#mensaje-vacio')
    const tablaHeader = document.querySelector('#tablaHeader')

    tabla.innerHTML = '';

    if (contador) {
        contador.textContent = `${casos.length} registros`
    }

    if (casos.length === 0) {
        mensajeVacio.classList.remove('d-none')
        tablaHeader.classList.add('d-none')
        return;
    }

    mensajeVacio.classList.add('d-none')
    tablaHeader.classList.remove('d-none')


    casos.forEach(element => {
        const tr = document.createElement('tr');
        const inicial = element.nombres_apellidos.charAt(0).toUpperCase();
        tr.innerHTML = `
    
    <td class="ps-4">
        <div class="d-flex align-items-center">
            <div class="avatar-circle">
                ${inicial}
            </div>
            <div>
            <div class="fw-bold text-dark">${element.nombres_apellidos}</div>
                <small class="text-muted d-block text-truncate" style="max-width: 150px;">
                        <i class="bi bi-geo-alt-fill me-1"></i>${element.direccion}
                </small>
            </div>
        </div>
    </td>

    <td><span class="font-monospace text-dark">${element.cedula}</span></td>
    <td>
        <div class="d-flex flex-column">
            <span class="fw-medium">${element.edad} años</span> 
            <small class="text-muted"><i class="bi bi-telephone me-1"></i>${element.telefono}</small>
        </div>
    </td>
    <td style="max-width: 250px;">
        <span class="d-inline-block text-truncate w-100 text-secondary" title="${element.motivo_consulta}">
            ${element.motivo_consulta}
        </span>
    </td>
    <td><span class="badge bg-light text-secondary border">${element.fecha_registro}</span></td>
    <td class="text-center">
        <a href="ResumenHistorial/${element.id}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
            Ver Detalles <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </td>
`;
        tabla.appendChild(tr);
    });
}
