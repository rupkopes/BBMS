const sideMenu = document.querySelector("aside");




// -------------------------Show sidebar-----------------------------
const menuBtn = document.querySelector("#menu-btn");
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

// --------------------------Close sidebar-------------------------------
const closeBtn = document.querySelector("#close-btn");
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})






//--------------------------------Dropdown sub-menu items in sidebar-------------------------------
// const dropDowns = document.querySelectorAll('.drop_down');
// dropDowns.forEach(dropDown => {
//     dropDown.addEventListener('click', function () {
//         const subMenu = this.nextElementSibling;
//         if (subMenu.style.display === 'block') {
//             subMenu.style.display = 'none';
//         } else {
//             subMenu.style.display = 'block';
//         }
//     });
// });






// document.addEventListener('DOMContentLoaded', function() {
//     const menuItems = document.querySelectorAll('.menu a');

//     menuItems.forEach(item => {
//         item.addEventListener('click', function(event) {
//             // Prevent default link behavior
//             event.preventDefault();

//             // Remove 'active' class from all menu items
//             menuItems.forEach(menuItem => {
//                 menuItem.classList.remove('active');
//             });

//             // Toggle submenu if applicable
//             const subMenu = this.nextElementSibling;
//             if (subMenu && subMenu.classList.contains('sub_menu')) {
//                 subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
//             }

//             // Add 'active' class to the clicked menu item
//             this.classList.add('active');
//         });
//     });
// });
 
   



// -------------------------------Change theme-----------------------------
// Function to apply theme based on stored preference (based on local storage)
const themeToggler = document.querySelector(".theme-toggler");
function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-theme-variables');
        themeToggler.querySelector('span:nth-child(1)').classList.add('active');
        themeToggler.querySelector('span:nth-child(2)').classList.remove('active');
    } else {
        document.body.classList.remove('dark-theme-variables');
        themeToggler.querySelector('span:nth-child(1)').classList.remove('active');
        themeToggler.querySelector('span:nth-child(2)').classList.add('active');
    }
}

// Function to toggle between light and dark theme
function toggleTheme() {
    const currentTheme = document.body.classList.contains('dark-theme-variables') ? 'light' : 'dark';
    applyTheme(currentTheme);

    // Update URL with theme parameter only when the theme toggler button is clicked
    const url = new URL(window.location.href);
    url.searchParams.set('theme', currentTheme);
    history.replaceState(null, '', url.toString());

    // Save theme preference in local storage
    localStorage.setItem('theme', currentTheme);
}

// Add event listener for theme toggler
themeToggler.addEventListener('click', toggleTheme);

// Apply the theme based on local storage on page load
window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const theme = localStorage.getItem('theme') || urlParams.get('theme') || 'light';
    applyTheme(theme);
});




// -----------------------Fill orders in table------------------------------------
// Orders.forEach(order => {
//     const tr = document.createElement('tr');
//     const trContent = `
//                         <td>${order.org_id}</td>
//                         <td>${order.org_name}</td>
//                         <td>${order.blood_type}</td>
//                         <td>${order.quantity}</td>
//                         <td class="${order.status === 'Rejected' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>

//                         <td class="primary">Details</td>
//                         `;
//     tr.innerHTML = trContent;
//     document.querySelector('table tbody').appendChild(tr);
// })



        
        //..................... Preview photo in comment section ..........................
        function previewFile() {
            const preview = document.getElementById('preview-image');
            const file = document.querySelector('input[type=file]').files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "/BBMS/images/camera.jpg";
            }
        }


