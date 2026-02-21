fetch('/api/planes')
            .then(response => response.json())
            .then(data => {
                const contenedor = document.getElementById('planes');

                data.forEach(plan => {
                    const card = document.createElement('div');
                    card.classList.add('plan-card');

                    const titulo = document.createElement('h2');
                    titulo.textContent = plan.nombre;
                    card.appendChild(titulo);

                    const descripcion = document.createElement('p');
                    descripcion.textContent = "Descripción: " + plan.descripcion;
                    card.appendChild(descripcion);

                    const fechaInicio = document.createElement('p');
                    fechaInicio.textContent = "Fecha inicio: " + plan.fecha_inicio;
                    card.appendChild(fechaInicio);

                    const fechaFin = document.createElement('p');
                    fechaFin.textContent = "Fecha fin: " + plan.fecha_fin;
                    card.appendChild(fechaFin);

                    const objetivo = document.createElement('p');
                    objetivo.textContent = "Objetivo: " + plan.objetivo;
                    card.appendChild(objetivo);

                    const activo = document.createElement('p');
                    activo.textContent = "Activo: " + (plan.activo ? "Sí" : "No");
                    card.appendChild(activo);

                    const hr = document.createElement('hr');
                    card.appendChild(hr);

                    // BOTÓN EDITAR
                    const btnEditar = document.createElement("button");
                    btnEditar.textContent = "Editar";
                    card.appendChild(btnEditar);

                    // EDITOR OCULTO
                    const editor = document.createElement("div");
                    editor.style.display = "none";

                    const inputNombre = document.createElement("input");
                    inputNombre.value = plan.nombre;

                    const inputDescripcion = document.createElement("input");
                    inputDescripcion.value = plan.descripcion;

                    const inputFechaInicio = document.createElement("input");
                    inputFechaInicio.type = "date";
                    inputFechaInicio.value = plan.fecha_inicio;

                    const inputFechaFin = document.createElement("input");
                    inputFechaFin.type = "date";
                    inputFechaFin.value = plan.fecha_fin;

                    const inputObjetivo = document.createElement("input");
                    inputObjetivo.value = plan.objetivo;

                    const inputActivo = document.createElement("select");
                    inputActivo.innerHTML = `
                <option value="1" ${plan.activo ? "selected" : ""}>Activo</option>
                <option value="0" ${!plan.activo ? "selected" : ""}>Inactivo</option>
            `;

                    const btnGuardar = document.createElement("button");
                    btnGuardar.textContent = "Confirmar cambios";

                    const btnCancelar = document.createElement("button");
                    btnCancelar.textContent = "Cancelar";

                    editor.appendChild(inputNombre);
                    editor.appendChild(inputDescripcion);
                    editor.appendChild(inputFechaInicio);
                    editor.appendChild(inputFechaFin);
                    editor.appendChild(inputObjetivo);
                    editor.appendChild(inputActivo);
                    editor.appendChild(btnGuardar);
                    editor.appendChild(btnCancelar);

                    card.appendChild(editor);

                    // Mostrar editor
                    btnEditar.addEventListener("click", () => {
                        editor.style.display = "block";
                    });

                    // Cancelar editor
                    btnCancelar.addEventListener("click", () => {
                        editor.style.display = "none";
                    });
                    // GUARDAR CAMBIOS (PUT)
                    btnGuardar.addEventListener("click", () => {
                        fetch(`/plan/${plan.id}`, {
                            method: "PUT",
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json"
                            },
                            body: JSON.stringify({ // coge los valores que el usuario escribio, los convierte en json s elos manda a laravel
                                nombre: inputNombre.value,
                                descripcion: inputDescripcion.value,
                                fecha_inicio: inputFechaInicio.value,
                                fecha_fin: inputFechaFin.value,
                                objetivo: inputObjetivo.value,
                                activo: inputActivo.value
                            })
                        })
                            .then(res => res.json())
                            .then(data => {
                                titulo.textContent = inputNombre.value;
                                descripcion.textContent = "Descripción: " + inputDescripcion.value;
                                fechaInicio.textContent = "Fecha inicio: " + inputFechaInicio.value;
                                fechaFin.textContent = "Fecha fin: " + inputFechaFin.value;
                                objetivo.textContent = "Objetivo: " + inputObjetivo.value;
                                activo.textContent = "Activo: " + (inputActivo.value == 1 ? "Sí" : "No");

                                editor.style.display = "none";
                            });
                    });

                    // BOTÓN ELIMINAR
                    const btnEliminar = document.createElement("button");
                    btnEliminar.textContent = "Eliminar";

                    btnEliminar.addEventListener("click", () => {
                        eliminarPlan(plan.id);
                        card.remove();
                    });

                    card.appendChild(btnEliminar);

                    contenedor.appendChild(card);
                });
            })
            .catch(error => console.error("Error:", error));

        // DELETE
        function eliminarPlan(id) {
            fetch(`/plan/${id}`, {
                method: "DELETE",
                headers: {
                    "Accept": "application/json"
                }
            })
                .then(res => res.json())
                .then(data => console.log("Plan eliminado:", data))
                .catch(err => console.error("Error eliminando plan:", err));
        }
        