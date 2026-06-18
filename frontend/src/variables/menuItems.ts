export const menuItems: any = [
    {
        label: 'Reports',
        icon: 'pi pi-clipboard',
        items: [
            {
                label: 'Report List',
                icon: 'pi pi-list',
                route: '/reports'
            },
            {
                label: 'Report Form',
                icon: 'pi pi-plus',
                route: '/report-form'
            }
        ]
    },
    {
        label: 'Users',
        icon: 'pi pi-users',
        items: [
            {
                label: 'User List',
                icon: 'pi pi-list',
                route: '/users'
            },
            {
                label: 'User Form',
                icon: 'pi pi-plus',
                route: '/user-form'
            }
        ]
    },
    {
        label: 'Cities',
        icon: 'pi pi-map-marker',
        route: '/cities'
    },
    {
        label: 'Countries',
        icon: 'pi pi-map',
        route: '/countries'
    },
    {
        label: 'About',
        icon: 'pi pi-info',
        route: '/about'
    }
]