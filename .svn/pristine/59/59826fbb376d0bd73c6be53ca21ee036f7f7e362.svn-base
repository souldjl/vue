<template>
    <el-row style="width:960px;margin:80px auto;">
        <el-col :span="8" class="addTeacher">
            <h5 class="teacher-title">已有老师列表</h5>
            <ul>
                <li class="teacherItem">
                    <span>教师名称</span>
                    <b class="teacherId">教师id</b>
                    操作
                </li>
                <li  class="teacherItem" v-for="(teacher, index) in teachers" :key="index"
                    :teacherName ="teacher.label" :teacherId="teacher.value">
                    <em>{{index+1}}</em>
                    <span>{{teacher.label}}</span>
                    <b class="teacherId">{{teacher.value}}</b>
                    <i class="el-icon-circle-cross deleteTeacher" @click="delTeacher(teacher.value)" title="删除此老师信息?"></i>
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
                  <el-button @click="onCancel">取消</el-button>
                  <el-button type="primary" @click="submitForm('ruleForm')">立即创建</el-button>
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
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            let teacherInfo={label:this.ruleForm.name,value:this.ruleForm.id};
           this.$store.dispatch('addTeacherInfo',teacherInfo);
            console.log(this.$store.state.teachers)
            this.$notify({
              title: '成功',
              message: '修改成功',
              type: 'success'
            });
            //this.$router.replace('/')
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      onCancel(){
        this.$router.back();
      },
      delTeacher(id){
        //console.log(id)
        this.$store.dispatch('deleteTeacher',id)
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
