(function () {
    const alerts = Array.from(document.querySelectorAll('.alert-success, .alert-danger, .alert-warning'));
    const flashMessages = [];
    const hasErrorAlert = alerts.some(function (alert) {
        return alert.classList.contains('alert-danger');
    });

    alerts.forEach(function (alert) {
        const message = (alert.innerText || alert.textContent || '').trim();
        if (message) {
            flashMessages.push({
                type: alert.classList.contains('alert-danger')
                    ? 'error'
                    : (alert.classList.contains('alert-warning') ? 'warning' : 'success'),
                message: message
            });
        }
        alert.remove();
    });

    if (!hasErrorAlert) {
        const errors = document.querySelector('[data-toast-errors]');
        if (errors && errors.textContent.trim()) {
            flashMessages.push({ type: 'error', message: errors.textContent.trim() });
        }
    }

    ['success', 'error', 'warning'].forEach(function (key) {
        const message = document.querySelector('[data-flash-' + key + ']');
        if (message && message.textContent.trim()) {
            flashMessages.push({
                type: key,
                message: message.textContent.trim()
            });
            message.remove();
        }
    });

    if (flashMessages.length === 0) {
        return;
    }

    const container = document.createElement('div');
    container.setAttribute('aria-live', 'polite');
    container.setAttribute('aria-relevant', 'additions');
    container.style.cssText = 'position:fixed;top:20px;right:20px;z-index:20000;width:min(400px,calc(100vw - 32px));display:grid;gap:10px;';
    document.body.appendChild(container);

    flashMessages.forEach(function (item) {
        const toast = document.createElement('div');
        const isError = item.type === 'error';
        const isWarning = item.type === 'warning';
        const color = isError ? '#b42318' : (isWarning ? '#9a6700' : '#067647');
        const background = isError ? '#fff1f0' : (isWarning ? '#fff8e6' : '#ecfdf3');
        toast.setAttribute('role', isError ? 'alert' : 'status');
        toast.style.cssText = 'position:relative;display:flex;align-items:flex-start;gap:12px;padding:15px 16px;border:1px solid ' + color + ';border-left-width:5px;border-radius:9px;background:' + background + ';color:#233044;box-shadow:0 12px 32px rgba(16,24,40,.16);font:500 14px/1.5 Arial,sans-serif;opacity:1;transition:opacity .25s ease;';

        const indicator = document.createElement('span');
        indicator.textContent = isError ? '!' : (isWarning ? '!' : '✓');
        indicator.setAttribute('aria-hidden', 'true');
        indicator.style.cssText = 'display:inline-grid;place-items:center;flex:0 0 22px;height:22px;border-radius:50%;background:' + color + ';color:#fff;font-weight:700;';

        const text = document.createElement('div');
        text.textContent = item.message;
        text.style.cssText = 'flex:1;white-space:pre-line;';

        const close = document.createElement('button');
        close.type = 'button';
        close.textContent = '×';
        close.setAttribute('aria-label', 'Dismiss notification');
        close.style.cssText = 'border:0;background:transparent;color:#667085;font-size:21px;line-height:1;cursor:pointer;padding:0 0 0 4px;';
        close.addEventListener('click', function () {
            toast.remove();
        });

        toast.append(indicator, text, close);
        container.appendChild(toast);
        window.setTimeout(function () {
            toast.style.opacity = '0';
            window.setTimeout(function () {
                toast.remove();
                if (container.childElementCount === 0) {
                    container.remove();
                }
            }, 250);
        }, 2750);
    });
})();
