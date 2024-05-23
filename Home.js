const images = [
    'url("https://image.architonic.com/prj2-3/20017680/brewin-design-office-executive-lounge-conrad-hotel-architonic-bdo-conradexecutivelounge-1-01-arcit18.jpg")',
    'url("https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWwlMjBiZWRyb29tfGVufDB8fDB8fHww")',
    'url("https://scdn.aro.ie/Sites/50/imperialhotels2022/uploads/images/PanelImages/General/156757283_Bedford_Hotel__F_B__Botanica_Restaurant_and_Bar__General_View._4500x3000.jpg")'
];
let currentIndex = 0;

function updateBackground() {
    document.body.style.backgroundImage = images[currentIndex];
}

function nextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    updateBackground();
}

function prevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateBackground();
}

updateBackground();