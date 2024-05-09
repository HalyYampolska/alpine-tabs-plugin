<body <?php body_class(); ?>>
    <div x-data="{ activeTab: 'tab1' }">
        <div class="tabs-container">
            <div @click="activeTab = 'tab1'" :class="{ 'active': activeTab === 'tab1' }" class="tab"><?php esc_html_e( 'Tab 1', 'alpine-tabs-plugin' ); ?></div>
            <div @click="activeTab = 'tab2'" :class="{ 'active': activeTab === 'tab2' }" class="tab"><?php esc_html_e( 'Tab 2', 'alpine-tabs-plugin' ); ?></div>
            <div @click="activeTab = 'tab3'" :class="{ 'active': activeTab === 'tab3' }" class="tab"><?php esc_html_e( 'Tab 3', 'alpine-tabs-plugin' ); ?></div>
        </div>
        
        <div class="tab-content">
            <template x-if="activeTab === 'tab1'">
                <div class="list-item">
                    <h3><?php esc_html_e( 'Title 1', 'alpine-tabs-plugin' ); ?></h3>
                    <p><?php esc_html_e( 'Description for Item 1', 'alpine-tabs-plugin' ); ?></p>
                </div>
            </template>
            
            <template x-if="activeTab === 'tab2'">
                <div class="list-item">
                    <h3><?php esc_html_e( 'Title 2', 'alpine-tabs-plugin' ); ?></h3>
                    <p><?php esc_html_e( 'Description for Item 2', 'alpine-tabs-plugin' ); ?></p>
                </div>
            </template>
            
            <template x-if="activeTab === 'tab3'">
                <div class="list-item">
                    <h3><?php esc_html_e( 'Title 3', 'alpine-tabs-plugin' ); ?></h3>
                    <p><?php esc_html_e( 'Description for Item 3', 'alpine-tabs-plugin' ); ?></p>
                </div>
            </template>
        </div>
    </div>
</body>
