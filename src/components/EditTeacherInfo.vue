<template>
    <el-row style="width:960px;margin:80px auto;">
        <el-col :span="10" class="addTeacher">
            <h5 class="teacher-title">已有老师列表</h5>
            <ul>
                <li class="teacherItem">
                    <span>教师名称</span>
                    <b class="teacherId">教师id</b>
                </li>
                <li  class="teacherItem" v-for="(teacher, index) in teachers" :key="index"
                    :teacherName ="teacher.name" :teacherId="teacher.id">
                    <em class="teacherIndex">{{index+1}}</em>
                    <span>{{teacher.name}}</span>
                    <b class="teacherId">{{teacher.id}}</b>
                    <el-button type="primary" icon="delete"  @click="delTeacher(teacher.id,index)" title="删除此老师信息?"></el-button>
                   <!-- <i class="el-icon-circle-cross deleteTeacher" @click="delTeacher(teacher.id,index)" title="删除此老师信息?"></i>-->
                </li>
            </ul>
        </el-col>
      <el-col :span="10" :offset="2">
          <h5 class="teacher-title">新增老师信息</h5>
          <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" >
              <el-form-item label="直播老师姓名" prop="name">
                  <el-input v-model="ruleForm.name"></el-input>
              </el-form-item>

              <el-form-item label="直播老师(id)" prop="id">
                  <el-input v-model="ruleForm.id"></el-input>
              </el-form-item>

              <el-form-item>
                  <el-button @click="onCancel">返回</el-button>
                  <el-button type="primary" @click="submitForm('ruleForm')" :disabled="isLoading">立即创建</el-button>
              </el-form-item>
          </el-form>
      </el-col>

    </el-row>

</template>

<script>
  import { mapMutations, mapActions } from 'vuex';
  import moment from 'moment';
  export default {
    data() {
      return {
        isLoading:false,
        ruleForm: {
          name: '',
          id:''
        },
        rules: {
          name: [
            { required: true, message: '请输入老师名称', trigger: 'blur' }
          ],
          id: [
            { required: true, message: '请输入老师id', trigger: 'blur' }
          ]
        }
      };
    },
    computed:{
      teachers(){
        return this.$store.state.teachers;
      }
    },
    methods: {
      ...mapActions([
        'addTeacherInfo',
        'deleteTeacher'
      ]),
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            let teacherInfo={name:this.ruleForm.name,id:this.ruleForm.id};
            this.isLoading = true;
           this.addTeacherInfo(teacherInfo)
            .then( ()=>{
             this.isLoading = false;
             this.$notify({
               title: '成功',
               message: '添加成功',
               type: 'success'
             });
             this.ruleForm={};
          //   this.$router.replace('/')
           })
             .catch ( (err)=>{
               this.$notify({
                 title: '操作失败，请重试',
                 message: '错误描述：' + err.emsg
               });
               this.isLoading = false;
             })
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      onCancel(){
        this.$router.back();
      },
      delTeacher(id,index){
        //console.log(id,index)
        this.isLoading = true;
        this.deleteTeacher({id,index})
          .then( ()=>{
            this.isLoading = false;
            this.$notify({
              title: '成功',
              message: '删除成功',
              type: 'success'
            });
          })
          .catch ( (err)=>{
            this.$notify({
              title: '操作失败，请重试',
              message: '错误描述：' + err.emsg
            });
            this.isLoading = false;
          })
      }
  }
  }
</script>
<style scoped>
ul{
    list-style:none;
    border:3px solid #fafafa;
    padding:10px;
    box-sizing: border-box;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 25px 50px 0 rgba(0, 0, 0, 0.1)
}
.addTeacher{

    padding:20px;
    box-sizing: border-box;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 25px 50px 0 rgba(0, 0, 0, 0.1)
}
.teacher-title{
    font-size: 24px;
    height: 40px;
    line-height: 40px;
    padding:2px 0;
    margin:0 0 20px 0;
}
li.teacherItem{
    height:40px;
}
li.teacherItem span{
   width:120px;
   display:inline-block;
}
li.teacherItem .teacherIndex{
    width:16px;
    display:inline-block;
    text-align:center;
}
li.teacherItem em{
  margin-right:8px;
}
.deleteTeacher{
    color:red;
    cursor:pointer;
}
.teacherId{
    width:80px;
    display:inline-block;
    font-weight:normal;
    text-align:left;
}
</style>
