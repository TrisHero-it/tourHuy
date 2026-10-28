@php
$flashSuccess = session('success');
$flashError = session('error');
$flashErrors = $errors->all();
@endphp

@if($flashSuccess || $flashError || count($flashErrors))
<style>
    .admin-flash-stack {
        position: fixed;
        top: 80px;
        right: 24px;
        z-index: 2000;
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 360px;
        max-width: calc(100vw - 32px);
        pointer-events: none;
    }

    .admin-flash {
        pointer-events: auto;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px 16px;
        border-radius: 10px;
        border-left: 4px solid;
        background: #fff;
        box-shadow: 0 8px 24px rgba(0, 0, 0, .14);
        font-size: 14px;
        line-height: 1.5;
        color: #2c3e50;
        transition: opacity .3s ease, transform .3s ease;
    }

    .admin-flash.is-hiding {
        opacity: 0;
        transform: translateX(110%);
    }

    .admin-flash--success {
        border-color: #1abc9c;
    }

    .admin-flash--error {
        border-color: #e74c3c;
    }

    .admin-flash__icon {
        font-size: 18px;
        line-height: 1.3;
    }

    .admin-flash--success .admin-flash__icon {
        color: #1abc9c;
    }

    .admin-flash--error .admin-flash__icon {
        color: #e74c3c;
    }

    .admin-flash__body {
        flex: 1 1 auto;
    }

    .admin-flash__title {
        font-weight: 600;
        margin-bottom: 2px;
    }

    .admin-flash__list {
        margin: 4px 0 0;
        padding-left: 18px;
    }

    .admin-flash__close {
        border: 0;
        background: none;
        font-size: 20px;
        line-height: 1;
        color: #95a5a6;
        cursor: pointer;
        padding: 0;
    }

    .admin-flash__close:hover {
        color: #576574;
    }

    @media (max-width: 575px) {
        .admin-flash-stack {
            top: 70px;
            right: 16px;
            left: 16px;
            width: auto;
        }
    }
</style>

<div class="admin-flash-stack" id="adminFlashStack">
    @if($flashSuccess)
    <div class="admin-flash admin-flash--success" data-autohide="4000">
        <i class="feather icon-check-circle admin-flash__icon" aria-hidden="true"></i>
        <div class="admin-flash__body">
            <div class="admin-flash__title">Thành công</div>
            <div>{{ $flashSuccess }}</div>
        </div>
        <button type="button" class="admin-flash__close" aria-label="Đóng">&times;</button>
    </div>
    @endif

    @if($flashError)
    <div class="admin-flash admin-flash--error" data-autohide="7000">
        <i class="feather icon-alert-circle admin-flash__icon" aria-hidden="true"></i>
        <div class="admin-flash__body">
            <div class="admin-flash__title">Có lỗi xảy ra</div>
            <div>{{ $flashError }}</div>
        </div>
        <button type="button" class="admin-flash__close" aria-label="Đóng">&times;</button>
    </div>
    @endif

    @if(count($flashErrors))
    <div class="admin-flash admin-flash--error" data-autohide="9000">
        <i class="feather icon-alert-triangle admin-flash__icon" aria-hidden="true"></i>
        <div class="admin-flash__body">
            <div class="admin-flash__title">Vui lòng kiểm tra lại thông tin</div>
            <ul class="admin-flash__list">
                @foreach(array_slice($flashErrors, 0, 5) as $flashErrorItem)
                <li>{{ $flashErrorItem }}</li>
                @endforeach
                @if(count($flashErrors) > 5)
                <li>... và {{ count($flashErrors) - 5 }} lỗi khác</li>
                @endif
            </ul>
        </div>
        <button type="button" class="admin-flash__close" aria-label="Đóng">&times;</button>
    </div>
    @endif
</div>

<script>
    (function() {
        var stack = document.getElementById('adminFlashStack');
        if (!stack) return;

        function dismiss(el) {
            if (!el || el.classList.contains('is-hiding')) return;
            el.classList.add('is-hiding');
            setTimeout(function() {
                el.remove();
            }, 300);
        }

        Array.prototype.forEach.call(stack.querySelectorAll('.admin-flash'), function(item) {
            var closeBtn = item.querySelector('.admin-flash__close');
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    dismiss(item);
                });
            }

            var delay = parseInt(item.getAttribute('data-autohide'), 10);
            if (delay > 0) {
                setTimeout(function() {
                    dismiss(item);
                }, delay);
            }
        });
    })();
</script>
@endif
