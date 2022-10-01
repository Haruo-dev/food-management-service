const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    menu_user = body.querySelector(".menu-user");

    toggle.addEventListener("click", () =>{
        sidebar.classList.toggle("close");
    });