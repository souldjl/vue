/**
 * Created by shaolei on 2017/4/21.
 */
import WebTools from "../libs/WebTools"

const hostname = window.location.hostname;

const domains = {
  prod:"http://www.hteacher.net/zhuanti/live_plan",
  dev:"http://dev.hteacher.net/zhuanti/live_plan",
}

let domain = ''

if( hostname =='www.hteacher.net' ) {
  domain = domains.prod
}else if( hostname =='localhost' || hostname == 'dev.hteacher.net' ) {
  domain = domains.dev
}else{
  domain = ''
}

const config = {
  domain,
  apis: {
    getPlan: "/get_plans.php",
    delPlan: "/del_plan.php",
    createPlan: "/create_plan.php",
    modifyPlan: "/modify_plan.php",
  }

}

export default {
  getPlans() {
    const url = config.domain + config.apis.getPlan
    return WebTools.getData( { url } )
  },
    delPlan(form) {
    const url = config.domain + config.apis.delPlan
    //const url = 'http://localhost:88/live/del_plan.php'
    return WebTools.postData( { url ,data:{
      id:form.id,
    }} )
  },
  createPlan( form ) {
    const url = config.domain + config.apis.createPlan
    //const url = 'http://localhost:88/live/create_plan.php'
    return WebTools.postData({
      url,
      data: {
        title: form.title,
        date: form.date,
        start_time: form.startTime,
        end_time: form.endTime,
        room_id: form.roomId,
        replay_id: form.replayId,
        secret: form.secret,
      }
    })
  },
  modifyPlan( form ) {
    const url = config.domain + config.apis.modifyPlan
    //const url = 'http://localhost:88/live/modify_plan.php'
    return WebTools.postData({
      url,
      data: {
        id: form.id,
        title: form.title,
        date: form.date,
        start_time: form.startTime,
        end_time: form.endTime,
        room_id: form.roomId,
        replay_id: form.replayId,
        secret: form.secret,
      }
    })
  },

}

