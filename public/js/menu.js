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