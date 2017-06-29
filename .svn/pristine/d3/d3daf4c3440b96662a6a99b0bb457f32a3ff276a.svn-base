<template>
    <el-row class="reward-detail">
        <el-row style="margin-bottom:20px;">
            <h4 style="margin-left:25px;">筛选(可单个条件筛选)</h4>
            <el-form :form="form" :inline="true"  ref="form" label-width="80px" >
                <el-form-item label="教师名称">
                    <el-select  :clearable="true" v-model="form.teacherId" filterable placeholder="按教师名称">
                        <el-option
                                v-for="item in teachers"
                                :key="item.id"
                                :label="item.name"
                                :value="item.id">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="支付状态">
                    <el-select  :clearable="true" v-model="form.payType"  placeholder="按支付状态">
                        <el-option
                                v-for="item in options"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="打赏者" prop="name">
                    <el-input v-model="form.customer"></el-input>
                </el-form-item>
                <el-form-item label="订单编号" prop="name">
                    <el-input v-model="form.trade_no"></el-input>
                </el-form-item>
                <el-form-item label="选择日期" prop="name">
                    <el-date-picker
                            v-model="form.date"
                            type="date"
                            format
                            clearable
                            placeholder="选择日期"
                            :picker-options="pickerOptions0">
                    </el-date-picker>
                </el-form-item>
               <el-form-item>
                    <el-button type="primary" @click="onSubmit" :loading="isLoading" :disabled="isLoading" icon="search">搜索</el-button>
                   <el-button @click="onCancel">返回</el-button>
                </el-form-item>
            </el-form>
        </el-row>
        <el-row>
            <el-table
                    class="el-table"
                    :data="tableData"
                    :stripe="true"
                    max-height="620"
                    empty-text="今日暂无打赏记录，请查看其他信息!"
                    border
                    @sort-change="sortByFee"
                    style="width: 100%">
                <el-table-column
                        fixed
                        prop="teacher_name"
                        label="教师名"
                        width="100px"
                >
                </el-table-column>
                <el-table-column
                        prop="lesson_title"
                        label="直播名"
                        width="400px"
                >
                </el-table-column>
                <el-table-column
                        prop="out_trade_no"
                        label="订单号"
                        width="260px"
                >
                </el-table-column>
                <el-table-column
                        prop="customer"
                        label="打赏者"
                        width="160px"
                >
                </el-table-column>
                <el-table-column
                        prop="fee"
                        label="金额"
                        width="100px"
                       sortable="custom"
                >
                </el-table-column>
                <el-table-column
                        prop="deal"
                        label="状态"
                        :formatter="formatterStatus"
                        width="100px"
                >
                </el-table-column>
                <el-table-column
                        prop="pay_types"
                        label="支付方式"
                        :formatter="formatterType"
                        width="100px"
                >
                </el-table-column>
                <el-table-column
                        prop="buyer_contact"
                        label="联系方式"
                        width="200px"
                >
                </el-table-column>
                <el-table-column
                        prop="third_trade_no"
                        label="订单编号"
                        width="300px"
                >
                </el-table-column>
                <el-table-column
                        prop="date"
                        label="交易日期"
                        :formatter="formatterTime"
                        width="200px"
                >
                </el-table-column>
            </el-table>
            <div class="block">
                <el-pagination
                        @size-change="handleSizeChange"
                        @current-change="handleCurrentChange"
                        :current-page="currentPage"
                        :page-sizes="[20, 50, 80, 100]"
                        :page-size="pageSize"
                        layout="total, sizes, prev, pager, next, jumper"
                        :total="total">
                </el-pagination>
            </div>
        </el-row>
    </el-row>
</template>

<script>
  import { mapMutations, mapActions } from 'vuex'
  import moment from 'moment'
  export default {
    computed: {
        tableData(){
            return this.$store.state.rewardInfos.rows != undefined ? this.$store.state.rewardInfos.rows : [];
        },
        total(){
            return this.$store.state.rewardInfos.rows != undefined ? this.$store.state.rewardInfos.total : 0
        },
        teachers(){
            return this.$store.state.teachers;
        },
      day(){
        if( this.form.date ){
          return moment(this.form.date)
        }else{
          return null
        }
      },
      nextDay(){
        if( this.form.date ){
          let nextDay= moment(this.form.date).add('1','d')
          return nextDay;
        }else{
          return null
        }
      }
    },
    methods: {
      ...mapActions([
        'fetchRewardInfos'
      ]),
      onCancel(){
        this.$router.back();
      },
     sortByFee(column){

        if( column.order == 'descending' ){
          let order = []
          order.push({
            fee: 'desc'
          })
          this.order = order
        }else if(column.order== 'ascending'){
          let order = []
          order.push({
            fee: 'asc'
          })
          this.order = order
        }else{
          this.order = null
        }

        this.fetchRewardDetail()
     },
      fetchRewardDetail(force=false){
       console.log( 'force', force )
       if( !force && this.isLoading ) {
         return
       }

       console.log('fetch reward execute')
        this.isLoading=true

        let args={
          limit: this.pageSize,
          page: this.currentPage,//=1
        }

        if( this.day ) {
          args.time_begin = this.day.format('X')
          args.time_end = this.nextDay.format('X')
        }

        if( this.order ) {
          args.order = this.order
        }

        if(this.form.teacherId !=''){
          args.teacher_id= this.form.teacherId
        }
        if(this.form.customer !=''){
          args.customer= this.form.customer
        }
        if(this.form.trade_no !=''){
          args.third_trade_no= this.form.trade_no
        }
        if(this.form.payType !=''){
          args.deal=this.form.payType;
        }

        this.$store.dispatch('fetchRewardInfos', args).then(()=>this.isLoading=false)
      },
      handleSizeChange(val) {
        console.log('handle size change')
        this.pageSize = val;
        this.fetchRewardDetail()
      },
      handleCurrentChange(val) {
          this.currentPage = val;
          this.fetchRewardDetail()
      },
      formatterStatus(row, column) {
        return row.deal == '0' ? '未支付' : '已支付';
      },
      formatterType(row, column) {
        return row.pay_type == '2' ? '支付宝' : '微信';
      },
      formatterTime(row, column) {
        return row.date + ' / ' + row.time;
      },
     onSubmit() {
        this.currentPage = 1
       this.fetchRewardDetail(true)
     }
    },
    data() {
      return {
        pageSize: 20,
        currentPage: 1,
        order:null,
        form:{
            teacherId:'',
            select:'',
            customer:'',
            trade_no:'',
            payType:'',
            date:'',
        },
        pickerOptions0:{},
        options: [{
              value: '1',
              label: '已支付'
             }, {
              value: '0',
              label: '未支付'
        }],
        isLoading:false,
      }
    },
    created(){
        this.form.date=this.$route.query.date;
        console.log(this.$route.query.date);
        this.fetchRewardDetail()
    },

  }
</script>
<style>
    .el-select>.el-input{
        width: 120px;
    }
</style>


