function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast ${type === 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700'} p-4 rounded-lg shadow-lg mb-2 animate-fade-in-out`;
    toast.innerHTML = `${message} <button onclick="this.parentElement.remove()" class="ml-4 text-sm">Close</button>`;
    document.getElementById('toast-container').appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

// Confirm delete
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure?')) {
                this.closest('form').submit();
            }
        });
    });
});

// Animation
const animateFadeInOut = `
    @keyframes fadeInOut {
        0% { opacity: 0; transform: translateY(20px); }
        10% { opacity: 1; transform: translateY(0); }
        90% { opacity: 1; transform: translateY(0); }
        100% { opacity: 0; transform: translateY(20px); }
    }
    .animate-fade-in-out {
        animation: fadeInOut 3s ease-out forwards;
    }
`;
const styleSheet = document.createElement('style');
styleSheet.textContent = animateFadeInOut;
document.head.appendChild(styleSheet);