// document.addEventListener('livewire:init', () => {

//     Livewire.on('vote-error', (data) => {
        
//         showAlert(data.message)
//     });

// });

// function showAlert(message) {
    
//     const el = document.createElement("div");
//     el.className = "fixed top-4 left-1/2 -translate-x-1/2 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded shadow z-65";
//     el.textContent = message;

//     document.body.appendChild(el);

//     // اختفاء بعد 3 ثوانٍ
//     setTimeout(() => {
//         el.style.opacity = "0";
//         el.style.transition = "opacity .5s";
//         setTimeout(() => el.remove(), 500);
//     }, 3000);
// }
