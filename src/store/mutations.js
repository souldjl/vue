import moment from 'moment'
import apiPlan from '../api/plan'

// export const PREFIX_DAYLIST = 'daylist'
// //key: daylist
// //value: ['clientid1','clientid2','clientid3']
//
// export const PREFIX_PLANLIST = 'planlist'
// //key: planlist:clientid
// //value: { id: '', date: 2017-04-17, plans: ['clientid1','clientid2','clientid3','clientid4'] }
//
// export const PREFIX_PLAN = 'plan'
// //key: plan:clientid
// //value: { id: '', title: '', date: 2017-04-17, startTime: 'unixtime', endTime: 'unixtime', roomId:'', secret:'' }

export const STORAGE_KEY = 'ht-liveplan'
export const state = {
  // planlists: JSON.parse(window.localStorage.getItem(STORAGE_KEY) || '[]'),
  planlists: [],
  wOffset:0,
  teachers:[
    /*{label:'吴雪娅',value:'540'},
    {label:'李新广',value:'292'},
    {label:'李晶晶',value:'437'}*/
  ],
};

let day = moment()

function nextDay() {
  let time ;
  let oL=state.planlists.length;
  if(oL){
    time=state.planlists[oL-1].date;
    let day2=moment(time);
    day2.add(1,'d');
    time=day2.format('YYYY-MM-DD')
  }else{
    // time = day.add( 1, 'd' );
    time=day.format('YYYY-MM-DD');
  }

  return time
}

function searchTeacher(str,arr){
  for(var i=0;i<arr.length;i++){
    if(str == arr[i]['value']){
      return i;
    }
  }
  return false;
}

export const mutations = {
  addPlanlist (state) {
    let date = nextDay();
    let oL=state.planlists.length;
    let planList = {
      date: date,
      plans:[],
    };
    state.planlists.push( planList );
    oL <=4 ? oL=4:oL;
    state.wOffset=oL-4;
  },

  delplanList (state,{planlistIndex}) {
   state.planlists.splice( planlistIndex,1 )
   // console.log(planlistIndex)
  },

  addPlan( state, plan ) {
    let planlist = state.planlists.find( ({date}) => date === plan.date )
    if( !planlist ) {
      planlist = { date: plan.date, plans:[] };
      state.planlists.push(planlist)
    }
    planlist.plans.push({
      id: plan.id,
      title: plan.title,
      date: plan.date,
      startTime: plan.start_time,
      endTime: plan.end_time,
      roomId: plan.room_id,
      replayId:plan.replay_id,
      secret: plan.secret,
    })
  },

  modifyPlan (state, {planlistIndex, planIndex, form}) {
    let plan = state.planlists[planlistIndex].plans[planIndex]
    for( let key in plan ) {
      plan[key] = form[key]
    }
  },

  deletePlan (state, { planlistIndex, planIndex }) {
    let plans = state.planlists[planlistIndex].plans
    plans.splice(planIndex, 1)
  },

  toLeft(state){
    state.wOffset--;
  },

  toRight(){
    state.wOffset++;
  },

  toEnd(){
    const len = state.planlists.length
    state.wOffset = len > 5 ? len - 5 : 0
  },

  //新增 添加教师信息
  addTeacherInfo(state,teacherInfo){
    console.log(teacherInfo);
    state.teachers.push(teacherInfo)
  },
  //新增 删除教师信息;
  deleteTeacher(state,id){
   let row = searchTeacher(id,state.teachers);
   state.teachers.splice(row,1)
  },
};

export const actions = {

  fetchPlans( { commit } ) {
    apiPlan.getPlans()
      .then( plans => {
        plans.map( plan => commit('addPlan', plan) )
        commit('toEnd')
      })
  },
 //
  fetchTeachersInfo( { commit } ) {
    let teachers=[
        {label:'吴雪娅',value:'540'},
        {label:'李新广',value:'292'},
        {label:'李晶晶',value:'437'}
      ];
    setTimeout(function(){
      teachers.map( teacherInfo => commit('addTeacherInfo', teacherInfo) )
    },2000);

    //apiPlan.getTeachersInfo()
   /* .then( teachers => {
        teachers.map( teacherInfo => commit('addTeacherInfo', teacherInfo) )
      })*/
  },
  deleteTeacher({commit},id){
    setTimeout(function(){
      commit('deleteTeacher',id)
    })
  },

  addTeacherInfo({commit},teacherInfo){
    setTimeout(function(){
      commit('addTeacherInfo',teacherInfo)
    },500)
  },
 //
  deletePlanList( { state, commit }, {planlistIndex} ) {
    let promises = state.planlists[planlistIndex].plans
      .map( plan => apiPlan.delPlan( plan ) )

    return Promise.all( promises ).then( results => {
      console.log(results)
      commit('delplanList', {planlistIndex})
      return results
    })
  },

  deletePlan( { state, commit },{ planlistIndex, planIndex } ) {

      let plan = state.planlists[planlistIndex].plans[planIndex]

      return apiPlan.delPlan( plan )
      .then( data => {
        // form.id = data.id
        commit('deletePlan', { planlistIndex, planIndex })
      })
  },

  addNewPlan ( {state, commit}, {planlistIndex, form} ) {
    form.planlistId = state.planlists[planlistIndex].id
    return apiPlan.createPlan( form )
      .then( data => {
        form.id = data.id
        let nform = form
        nform.start_time = form.startTime
        nform.end_time = form.endTime
        nform.room_id = form.roomId
        nform.replay_id = form.replayId
        commit('addPlan', nform)
      })
  },

  modifyPlan ( {state, commit}, {planlistIndex, planIndex, form} ) {
    return apiPlan.modifyPlan( form )
      .then( () => commit('modifyPlan', {planlistIndex, planIndex, form} ) )
    // commit('modifyPlan', {planlistIndex, planIndex, form} )
    // return Promise.resolve()
  }


  //delete planlists



}

