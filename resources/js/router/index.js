
import Visitor from '../views/user/VisitorComponent.vue'

import AdminAuth from '../views/admin/LogIn/index.vue'
import AdminUnit from '../views/admin/Unit/index.vue'
import AdminCreateUnit from '../views/admin/Unit/Create.vue'
import AdminEditUnit from '../views/admin/Unit/Edit.vue'
import AdminCreateVisitor from '../views/admin/Visitor/Create.vue'
import AdminVisitor from '../views/admin/Visitor/index.vue'
import Vue from 'vue'
import Router from 'vue-router'
import Meta from 'vue-meta'

Vue.use(Router)
Vue.use(Meta)

export default {
    mode: 'history',
    scrollBehavior() {
        return {
            x: 0,
            y: 0
        };
    },
    routes: [
        {
            path: '/visitor',
            name: 'visitor',
            component: Visitor,
        },
        {
            path: '/admin/login',
            name: 'admin-login',
            component: AdminAuth,
        },
        {
            path: '/admin/unit',
            name: 'admin-unit',
            component: AdminUnit,
        },
        {
            path: '/admin/create-unit',
            name: 'admin-create-unit',
            component: AdminCreateUnit,
        },
        {
            path: '/admin/edit-unit',
            name: 'admin-edit-unit',
            component: AdminEditUnit,
        },
        {
            path: '/admin/create-visitor',
            name: 'admin-create-visitor',
            component: AdminCreateVisitor,
        },
        {
            path: '/admin/visitor',
            name: 'admin-visitor',
            component: AdminVisitor,
        },
    ]

}
