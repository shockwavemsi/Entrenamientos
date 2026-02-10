<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>
<body>
<h1>Bienvenido {{ Auth::user()->nombre }}</h1>

<ul id="menu"></ul>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

{{-- - <script src="{{ asset('js/menu.js') }}"></script>--}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const menuContainer = document.getElementById("menu");

    fetch("/menu.json")
        .then(response => response.json())
        .then(data => renderMenu(data, menuContainer))
        .catch(error => console.error("Error cargando el menú:", error));
});

function renderMenu(items, container) {
    items.forEach(item => {
        const li = document.createElement("li");

        // Enlace principal
        const link = document.createElement("a");
        link.textContent = item.name;
        link.href = item.url;
        li.appendChild(link);

        // Submenú si tiene hijos
        if (item.children && item.children.length > 0) {
            const subUl = document.createElement("ul");
            subUl.classList.add("submenu");

            item.children.forEach(child => {
                const subLi = document.createElement("li");
                const subLink = document.createElement("a");

                subLink.textContent = child.name;
                subLink.href = child.url;

                subLi.appendChild(subLink);
                subUl.appendChild(subLi);
            });

            li.appendChild(subUl);
        }

        container.appendChild(li);
    });
}
</script>
</body>
</html>
