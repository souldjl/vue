import Vue from 'vue'
import Router from 'vue-router'
import ListContainer from '../components/ListContainer.vue'
import Edit from '../components/Edit.vue'
import EditTeacherInfo from '../components/EditTeacherInfo.vue'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: ListContainer
    },
    {
      name: 'edit_plan',
      path: '/edit_plan',
      component: Edit
    },
    {
      name: 'edit_plan',
      path: '/edit_teacherInfo',
      component: EditTeacherInfo
    },
  ]
})
