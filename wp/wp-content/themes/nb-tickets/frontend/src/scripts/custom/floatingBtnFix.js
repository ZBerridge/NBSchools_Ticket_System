const floatingBtnFix = {
    init: function() {
        var elems = document.querySelectorAll('.fixed-action-btn');
        var instances = M.FloatingActionButton.init(elems, {
          hoverEnabled: false
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    floatingBtnFix.init()
}, false);