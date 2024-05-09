// Defining a tabs() component using Alpine.data
document.addEventListener('alpine:init', () => {
    Alpine.data('tabs', function() {
        return {
            activeTab: 'tab1',
            changeTab(tab) {
                this.activeTab = tab;
            },
        };
    });
});

// Defining a tabs() component in global scope
function tabs() {
    return {
        activeTab: 'tab1',
        changeTab(tab) {
            this.activeTab = tab;
        },
    };
}
