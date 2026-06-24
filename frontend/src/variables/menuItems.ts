export const menuItems: any = [
    {
        label: 'Reports',
        icon: 'pi pi-clipboard',
        items: [
            {
                label: 'ReportList',
                icon: 'pi pi-list',
                route: '/reports'
            },
            {
                label: 'ReportForm',
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
                label: 'UserList',
                icon: 'pi pi-list',
                route: '/users'
            },
            {
                label: 'UserForm',
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