const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

// -------------------------Show sidebar-----------------------------
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

// --------------------------Close sidebar-------------------------------
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

// -------------------------------Change theme-----------------------------
// Function to toggle between light and dark theme
function toggleTheme() {
    // Toggle the dark-theme-variables class on the body
    document.body.classList.toggle('dark-theme-variables');

    // Toggle the active class on the themeToggler span elements
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');

    // Update URL with theme parameter only when the theme toggler button is clicked
    const currentTheme = document.body.classList.contains('dark-theme-variables') ? 'dark' : 'light';
    const url = new URL(window.location.href);
    url.searchParams.set('theme', currentTheme);
    history.replaceState(null, '', url.toString());
}

// Add event listener for theme toggler
themeToggler.addEventListener('click', toggleTheme);

// Apply the theme based on URL parameter on page load only if the theme toggler button was not clicked
window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const theme = urlParams.get('theme');
    if (theme === 'dark' && !document.body.classList.contains('dark-theme-variables')) {
        toggleTheme(); // Apply dark theme if 'dark' theme parameter is present
    }
});


// -----------------------Fill orders in table------------------------------------
Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
                        <td>${order.org_id}</td>
                        <td>${order.org_name}</td>
                        <td>${order.blood_type}</td>
                        <td>${order.quantity}</td>
                        <td class="${order.status === 'Rejected' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>

                        <td class="primary">Details</td>
                        `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
})

//--------------------------------Dropdown sub-menu items in sidebar-------------------------------
        const dropDowns = document.querySelectorAll('.drop_down');
        dropDowns.forEach(dropDown => {
            dropDown.addEventListener('click', function () {
                const subMenu = this.nextElementSibling;
                if (subMenu.style.display === 'block') {
                    subMenu.style.display = 'none';
                } else {
                    subMenu.style.display = 'block';
                }
            });
        });


        // const menuItems = document.querySelectorAll('.sidebar .menu');

        // menuItems.forEach(menuItem => {
        //     menuItem.addEventListener('click', function (event) {
        //         // Prevent the default behavior of the hyperlink
        //         event.preventDefault();
        
        //         // Remove 'active' class from all menu items
        //         menuItems.forEach(item => {
        //             item.classList.remove('active');
        //         });
        
        //         // Add 'active' class to the clicked menu item
        //         this.classList.add('active');
        
        //         // Close all dropdowns except the clicked one
        //         const subMenu = this.querySelector('.sub_menu');
        //         if (subMenu) {
        //             const openSubMenus = document.querySelectorAll('.sidebar .sub_menu');
        //             openSubMenus.forEach(openSubMenu => {
        //                 if (openSubMenu !== subMenu && openSubMenu.style.display === 'block') {
        //                     openSubMenu.style.display = 'none';
        //                 }
        //             });
        //             subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
        //         }
        //     });
        // });


        
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


