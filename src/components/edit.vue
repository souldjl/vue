<template>
    <el-row>
        <el-col :span="14" :offset="5">
            <h4 style="text-align:center;height:80px;line-height:80px;">直播相关信息</h4>
            <el-form  :model="form"  :rules="rules" ref="form" label-width="120px" >

              <el-form-item label="直播日期">
                <el-col>
                  <div>{{form.date}}</div>
                </el-col>
              </el-form-item>

              <el-form-item label="直播主题" prop="title">
                <el-input v-model="form.title" type="textarea"></el-input>
              </el-form-item>
                <el-form-item label="教师名称">
                    <el-select  v-model="form.teacherId" filterable placeholder="请选择教师名称">
                        <el-option
                                v-for="item in teachers"
                                :key="item.id"
                                :label="item.name"
                                :value="item.id">
                        </el-option>
                    </el-select>
                </el-form-item>
              <el-form-item label="播出时段" required>
                  <el-row>
                      <el-col :span="7">
                          <el-form-item prop="startTime">
                              <el-select v-model="form.startTime" filterable allow-create placeholder="请选择开始时间">
                                  <el-option
                                          v-for="item in options"
                                          :key="item.value"
                                          :label="item.label"
                                          :value="item.value">
                                  </el-option>
                              </el-select>
                          </el-form-item>

                      </el-col>
                      <el-col :span="7" :offset="2">
                          <el-form-item prop="endTime">
                              <el-select v-model="form.endTime" filterable allow-create placeholder="请选择结束时间">
                                  <el-option
                                          v-for="item in options"
                                          :key="item.value"
                                          :label="item.label"
                                          :value="item.value">
                                  </el-option>
                              </el-select>
                          </el-form-item>

                      </el-col>
                  </el-row>
              </el-form-item>

              <el-form-item label="直播间id" prop="roomId">
                    <el-input v-model="form.roomId"></el-input>
                </el-form-item>

                <el-form-item label="录播间id" prop="replayId">
                    <el-input v-model="form.replayId"></el-input>
                </el-form-item>

              <el-form-item label="用户口令">
                <el-input v-model="form.secret"></el-input>
              </el-form-item>

                <el-form-item>
                    <el-button @click="onCancel">取消</el-button>
                    <el-button type="primary" @click="onSubmit('form')" :loading="isLoading" :disabled="isLoading">保存</el-button>
                </el-form-item>
            </el-form>
        </el-col>
    </el-row>
</template>

<script>
  import { mapMutations, mapActions } from 'vuex';
  import moment from 'moment'
  export default {
    data() {
      let validatePass = (rule, value, callback) => {
      let time = moment('2015-04-17'+' '+value).isValid();
        if (time) {
            callback();
        }else{
          callback(new Error('时间输入不正确'))
        }
      };
      return {
        isLoading:false,
        options: [{"value":"00:00","label":"00:00"},{"value":"00:15","label":"00:15"},{"value":"00:30","label":"00:30"},{"value":"00:45","label":"00:45"},{"value":"01:00","label":"01:00"},{"value":"01:15","label":"01:15"},{"value":"01:30","label":"01:30"},{"value":"01:45","label":"01:45"},{"value":"02:00","label":"02:00"},{"value":"02:15","label":"02:15"},{"value":"02:30","label":"02:30"},{"value":"02:45","label":"02:45"},{"value":"03:00","label":"03:00"},{"value":"03:15","label":"03:15"},{"value":"03:30","label":"03:30"},{"value":"03:45","label":"03:45"},{"value":"04:00","label":"04:00"},{"value":"04:15","label":"04:15"},{"value":"04:30","label":"04:30"},{"value":"04:45","label":"04:45"},{"value":"05:00","label":"05:00"},{"value":"05:15","label":"05:15"},{"value":"05:30","label":"05:30"},{"value":"05:45","label":"05:45"},{"value":"06:00","label":"06:00"},{"value":"06:15","label":"06:15"},{"value":"06:30","label":"06:30"},{"value":"06:45","label":"06:45"},{"value":"07:00","label":"07:00"},{"value":"07:15","label":"07:15"},{"value":"07:30","label":"07:30"},{"value":"07:45","label":"07:45"},{"value":"08:00","label":"08:00"},{"value":"08:15","label":"08:15"},{"value":"08:30","label":"08:30"},{"value":"08:45","label":"08:45"},{"value":"09:00","label":"09:00"},{"value":"09:15","label":"09:15"},{"value":"09:30","label":"09:30"},{"value":"09:45","label":"09:45"},{"value":"10:00","label":"10:00"},{"value":"10:15","label":"10:15"},{"value":"10:30","label":"10:30"},{"value":"10:45","label":"10:45"},{"value":"11:00","label":"11:00"},{"value":"11:15","label":"11:15"},{"value":"11:30","label":"11:30"},{"value":"11:45","label":"11:45"},{"value":"12:00","label":"12:00"},{"value":"12:15","label":"12:15"},{"value":"12:30","label":"12:30"},{"value":"12:45","label":"12:45"},{"value":"13:00","label":"13:00"},{"value":"13:15","label":"13:15"},{"value":"13:30","label":"13:30"},{"value":"13:45","label":"13:45"},{"value":"14:00","label":"14:00"},{"value":"14:15","label":"14:15"},{"value":"14:30","label":"14:30"},{"value":"14:45","label":"14:45"},{"value":"15:00","label":"15:00"},{"value":"15:15","label":"15:15"},{"value":"15:30","label":"15:30"},{"value":"15:45","label":"15:45"},{"value":"16:00","label":"16:00"},{"value":"16:15","label":"16:15"},{"value":"16:30","label":"16:30"},{"value":"16:45","label":"16:45"},{"value":"17:00","label":"17:00"},{"value":"17:15","label":"17:15"},{"value":"17:30","label":"17:30"},{"value":"17:45","label":"17:45"},{"value":"18:00","label":"18:00"},{"value":"18:15","label":"18:15"},{"value":"18:30","label":"18:30"},{"value":"18:45","label":"18:45"},{"value":"19:00","label":"19:00"},{"value":"19:15","label":"19:15"},{"value":"19:30","label":"19:30"},{"value":"19:45","label":"19:45"},{"value":"20:00","label":"20:00"},{"value":"20:15","label":"20:15"},{"value":"20:30","label":"20:30"},{"value":"20:45","label":"20:45"},{"value":"21:00","label":"21:00"},{"value":"21:15","label":"21:15"},{"value":"21:30","label":"21:30"},{"value":"21:45","label":"21:45"},{"value":"22:00","label":"22:00"},{"value":"22:15","label":"22:15"},{"value":"22:30","label":"22:30"},{"value":"22:45","label":"22:45"},{"value":"23:00","label":"23:00"},{"value":"23:15","label":"23:15"},{"value":"23:30","label":"23:30"},{"value":"23:45","label":"23:45"},{"value":"24:00","label":"24:00"}],
        query: this.$route.query,
        form: {
          key: null,
          id: null,
          title: '',
          roomId: null,
          replayId:null,
          secret: null,
          date: null,
          startTime: null,
          endTime: null,
          teacherId:''
        },
        rules: {
          title: [
            { required: true, message: '请输入直播名称', trigger: 'blur' },
            {  max: 30, message: '长度不得大于 30 个字符', trigger: 'blur' }
          ],
          startTime:[
            { required: true,  trigger: 'blur' },
            { validator: validatePass, trigger: 'blur' }
          ],
          endTime:[
            { required: true, message: '请选择结束时间', trigger: 'blur' },
            { validator: validatePass, trigger: 'blur' }
          ],
          roomId:[
            { required: true, message: '请输入直播间id', trigger: 'blur' },
          ]
        }
      }
    },
    created(){
      if( this.query.method == 'modify' ) {
        //已有数据
        for( let key in this.form ) {
          this.form[key] = this.plan[key]
        }
        console.log(this.form.teacherId)
        if(!this.form.teacherId == 0){
          this.form.teacherId=Number(this.form.teacherId);
        }
       // this.form.teacherId=Number(this.form.teacherId);
      }else{
        //新数据
        this.form.date = this.query.date
      };
    },
    computed: {
      plans () {
        return this.$store.state.planlists[this.query.planlistIndex].plans
      },
      plan () {
        return this.plans[this.query.planIndex]
      },
      teachers(){
        return this.$store.state.teachers;
      }
    },
    methods: {
      ...mapActions([
        'addNewPlan',
        'modifyPlan'
      ]),
//      ...mapActions([
//        'modifyPlan',
//      ]),
      onSubmit(editForm) {

        this.$refs[editForm].validate((valid) => {
          if (valid) {
            if( this.form.startTime == '24:00' ) {
              this.form.startTime = '23:59'
            }
            if( this.form.endTime == '24:00' ) {
              this.form.endTime = '23:59'
            }

            this.form.startTime = moment('2015-04-17'+' '+this.form.startTime).format('HH:mm');
            this.form.endTime = moment('2015-04-17'+' '+this.form.endTime).format('HH:mm');

            this.isLoading = true;
            if(!this.form.teacherId){
              this.form.teacherId='0';
            }
         //   console.log(this.form);
            if( this.query.method == 'modify' ) {
              this.modifyPlan({
                planlistIndex: this.query.planlistIndex,
                planIndex: this.query.planIndex,
                form: this.form,
              })
                .then( ()=>{
                  this.isLoading = false;
                  this.$notify({
                    title: '成功',
                    message: '修改成功',
                    type: 'success'
                  });
                  this.$router.replace('/')
                })
                .catch ( (err)=>{
                      this.$notify({
                          title: '操作失败，请重试',
                          message: '错误描述：' + err.emsg
                      });
                      this.isLoading = false;
                 })
            }else{
              //新数据
              this.addNewPlan({
                planlistIndex: this.query.planlistIndex,
                form: this.form,
              })
                .then( () => {
                  this.isLoading = false;
                  this.$notify({
                    title: '成功',
                    message: '添加成功',
                    type: 'success'
                  })
                  this.$router.replace('/')
                })
                .catch ( (err)=>{
                  this.$notify({
                    title: '操作失败，请重试',
                    message: '错误描述：' + err.emsg
                  });
                  this.isLoading = false;
                })
            }

          } else {
            console.log('error submit!!');
            return false;
          }
        });

      },

      onCancel() {
        this.$router.back()
      }

    }
  }
</script>
