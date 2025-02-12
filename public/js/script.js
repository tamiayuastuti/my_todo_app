document.addEventListener("DOMContentLoaded", () =>
    /** document.addEventListener adalah metode dalam JavaScript yang digunakan untuk menambahkan event listener ke elemen DOM (Document Object Model). Event listener ini digunakan untuk merespons interaksi pengguna, seperti klik, hover, perubahan input, dan banyak lagi */
    {
        const content =
            /** const content adalah sebuah deklarasi variabel menggunakan const di JavaScript. Variabel yang dideklarasikan dengan const memiliki sifat tidak dapat diubah  */
            document.getElementById("content");
        const navbarHeight = document.querySelector(
            /** document.querySelector(selector) digunakan untuk memilih elemen DOM pertama yang cocok dengan selektor CSS yang diberikan. */
            ".navbar"
        ).offsetHeight;
        content.style.paddingTop =` ${navbarHeight + 16}px`;

        const addTaskModal = document.getElementById("addTaskModal");
        addTaskModal.addEventListener("show.bs.modal", (e) => {
            const btn = e.relatedTarget;
            const taskId = btn.getAttribute("data-list");
            document.getElementById("taskListId").value = taskId;
    });
    }
);