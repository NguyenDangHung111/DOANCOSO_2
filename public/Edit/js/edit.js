

document.addEventListener('DOMContentLoaded', function () {
  const close_menu = document.getElementById('close_menu');
  const navbar = document.querySelector('.menu-sidebar');
  const main_content = document.querySelector('.main-content');
  const header_desktop = document.querySelector('.header-desktop');

  close_menu.addEventListener('click', function () {
    const currentLeftValue = parseInt(getComputedStyle(navbar).left);

    if (currentLeftValue < 0) {
      // Nếu thanh navbar đang ẩn, hiển thị nó
      navbar.style.left = '0';
      main_content.style.marginLeft = '-80px';
      header_desktop.style.left = '220px';
    } else {
      // Nếu thanh navbar đang hiển thị, ẩn nó
      navbar.style.left = '-220px';
      main_content.style.marginLeft = '-315px';
      header_desktop.style.left = '0px';
    }
  });
});

let isIconChanged = false;

function toggleIcon() {
  const iconElement = document.getElementById('icon');

  if (isIconChanged) {
    // Nếu icon đã được thay đổi, chuyển về icon ban đầu
    iconElement.classList.remove('fa-eye');
    iconElement.classList.add('fa-eye-slash');
  } else {
    // Nếu icon chưa được thay đổi, thay đổi sang icon mới
    iconElement.classList.remove('fa-eye-slash');
    iconElement.classList.add('fa-eye');
  }

  // Đảo ngược trạng thái của biến isIconChanged
  isIconChanged = !isIconChanged;
}

