<template>
  <li class="todo">
    <div class="view" @click="editPlan" >
      <el-row >
          <el-row>
            <el-col :span="2">
              <i class="el-icon-information" style="font-size:18px;color:#8492a6;"></i>
            </el-col>
            <el-col :span="20">
              <label v-text="plan.title"></label>
            </el-col>
            <el-col :span="1">
              <button class="destroy" @click.stop="del"></button>
            </el-col>
          </el-row>
          <el-row>
            <el-col style="font-size:14px;" :offset="2">
              <i class="el-icon-star-off" style="font-size:10px;margin-right:8px;color:#f90"></i>
              <span class="liveTime">时间：</span> <span>{{plan.startTime}}</span> -<span>{{plan.endTime}}</span>
            </el-col>
          </el-row>
        <el-col>

        </el-col>
      </el-row>


    </div>
  </li>
</template>

<script>
import { mapMutations, mapActions } from 'vuex'

export default {
  name: 'Plan',
  props: ['plan', 'planlistIndex', 'planIndex'],
  directives: {
    focus (el, { value }, { context }) {
      if (value) {
        context.$nextTick(() => {
          el.focus()
        })
      }
    }
  },
  methods: {
    //辅助函数不能作为事件响应函数 @click="deletePlan"不能将参数正确传递给store
    ...mapActions([
      'deletePlan',
    ]),
    del () {
      this.$confirm('此操作将删除直播计划, 是否继续?', '提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(() => {
        this.deletePlan({
          planlistIndex: this.planlistIndex,
          planIndex: this.planIndex
        }).then(()=> {
          this.$message({
            type: 'success',
            message: '删除成功!'
          });
        }).catch((e) => {
          console.log(e)
          this.$message({
            type: 'error',
            message: e.emsg
          })
        });


      }).catch((e) => {
        this.$message({
          type: 'info',
          message: '已取消删除'
        });
      });

    },
    editPlan(){
      this.$router.push({
        path: '/edit_plan',
        query: { method: 'modify', planlistIndex: this.planlistIndex, planIndex: this.planIndex }
      })
    }
  }
}
</script>

<style scoped>
  .liveTime{
    font-size: 14px;
    color:#324057;
  }
  button {
    margin: 0;
    padding: 0;
    border: 0;
    background: none;
    font-size: 100%;
    vertical-align: baseline;
    font-family: inherit;
    font-weight: inherit;
    color: inherit;
    -webkit-appearance: none;
    appearance: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
</style>
