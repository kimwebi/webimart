document.addEventListener('livewire:init', () => {
    Livewire.on('notify', ({ type, message }) => {

        const toast = document.createElement('div');

        toast.className = `
            px-6 py-4 rounded-xl shadow-2xl text-white
            flex items-center justify-between gap-4
            transform transition-all duration-300 ease-in-out
            ${type === 'success'
            ? 'bg-blue-500 border border-blue-600'
            : 'bg-rose-600 border border-rose-700'}
        `;

        toast.innerHTML = `
            <div class="flex-1 bg-blue-500">
                <strong class="block text-lg">
                    ${type === 'success' ? 'Success' : 'Error'}
                </strong>
                <span class="text-sm bg-blue-500 opacity-90">${message}</span>
            </div>
            <button class="text-white text-xl font-bold leading-none"
                    onclick="this.parentElement.remove()">×</button>
        `;

        const container = document.getElementById('toast-container');
        if (!container) return;

        container.appendChild(toast);

        // Animate in
        requestAnimationFrame(() => {
            toast.classList.add('translate-y-0', 'opacity-100');
        });

        // Auto remove
        setTimeout(() => {
            toast.classList.add('opacity-0', '-translate-y-4');
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    });
});
