<template>
  <section class="todoapp">
    <header class="header">
      <el-row class="h1">
        <el-col :span="20">
          <div >{{planlist.date}}</div>
        </el-col>
        <el-col :span="1">
          <i class="el-icon-circle-cross"  size="mini" @click="del"  style="font-size:18px;color:#ff4949;position:absolute;top:-9px;left:-9px;cursor:pointer;"></i>
        </el-col>
          <el-col  :span="1" :offset="2">
            <el-button @click="add" type="info" icon="plus" size="mini" >
            </el-button>
          </el-col>
      </el-row>
    </header>
    <section class="main">
      <div class="noResources" v-if="plans.length<=0" >还没有直播计划哦，添加一个吧！</div>
      <ul class="todo-list">
        <Plan v-for="(plan, index) in plans" :key="index"
              :plan="plan" :planlistIndex ="planlistIndex" :planIndex="index"></Plan>
      </ul>
    </section>
    <footer class="footer" @click="seeDetails">
      <div class="todo-count">当日直播计划:共<strong class="toEmphasize">{{ remaining }}</strong>条</div>
      <div  class="" href="javascript:;" title="点击查看明细">当日共收到打赏<strong class="toEmphasize">{{sum}}</strong>元<i class="el-icon-caret-right ml5"></i></div>
    </footer>
  </section>
</template>

<script>
  import { mapMutations, mapActions } from 'vuex'
  import apiPlan from '../api/plan'
  import WebTools from "../libs/WebTools"
  import Plan from './Plan.vue'

  export default {
    components: { Plan },
    props: ['planlist', 'planlistIndex'],
    data(){
      return {
        sum:0,
      }
    },
    computed: {
      plans() {
        const sorted = this.planlist.plans.sort( (a,b) => {
          if( a.startTime > b.startTime ) {
            return 1
          }else if( a.startTime < b.startTime ) {
            return -1
          }else{
            return 0
          }
        })
        return sorted
      },
      remaining () {
        return this.plans.length
      }
    },
    created(){
        apiPlan.getSums(this.planlist.date).then((data)=>{
            data.sum?(this.sum=data.sum):(this.sum=0)
        });
    },
    methods: {
      ...mapActions([
        'deletePlanList'
      ]),
      ...mapMutations([
        'addPlan',
        'deletePlan',
      ]),
      del(){
        this.$confirm('此操作将删除此日期内的的所有直播计划, 是否继续?', '提示', {
          cancelButtonText: '取消',
          confirmButtonText: '确定',
          type: 'warning'
        }).then(() => {
//          this.delplanList({
//            planlistIndex:this.planlistIndex
//          })
          this.deletePlanList({
            planlistIndex:this.planlistIndex
          }).then( ()=> {
            this.$message({
              type: 'success',
              message: '删除成功!'
            })
          }).catch( err => {
            console.log( err )
            this.$message({ type: 'error', message: err.emsg })
          } )

        }).catch(() => {
          this.$message({
            type: 'info',
            message: '已取消删除'
          });
        });

      },
      add (e) {
        this.$router.push({
          path: '/edit_plan',
          query: { method: 'new', date: this.planlist.date, planlistIndex: this.planlistIndex }
        })
      },
      seeDetails(){
        this.$router.push({
          path:'/reward_detail',
          query: { date: this.planlist.date}
        })
      }
    }
  }
</script>

<style>
  .header{
    border: 1px solid #ddd;
    border-top: 4px solid #9BCE37;
    border-radius: 4px;
    box-sizing: border-box;
  }
  .toEmphasize{
    color:red;
    margin:0 5px;
  }
  .noResources{
    text-align:center;
    height:40px;
    line-height:40px;
    font-style: italic;
    color:#333;
  }
</style>


