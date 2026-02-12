function copyToClipboard() {
    const codeEl = document.getElementById('ref-code');
    if (!codeEl) return;

    const code = codeEl.innerText.trim();
    navigator.clipboard.writeText(code).then(() => {
        const toast = document.getElementById('copy-toast');
        if (toast) {
            // New animation classes for the centered bottom toast
            toast.classList.remove('opacity-0', 'translate-y-10');
            toast.classList.add('opacity-100', 'translate-y-0');

            setTimeout(() => {
                toast.classList.remove('opacity-100', 'translate-y-0');
                toast.classList.add('opacity-0', 'translate-y-10');
            }, 3000);
        }
    }).catch(err => {
        console.error('Failed to copy:', err);
    });
}
