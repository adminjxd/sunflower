<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<link rel="shortcut icon" href="favicon.ico"> <link href="{{ URL::asset('/css/bootstrap.min.css?v=3.3.6') }}css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="{{ URL::asset('/css/font-awesome.css?v=4.4.0') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/animate.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/summernote.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/summernote-bs3.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/style.css?v=4.1.0') }}" rel="stylesheet">
<!-- jQuery UI -->

<script src="{{ URL::asset('/js/jquery-ui-1.10.4.min.js') }}"></script>
 <!-- 全局js -->
<script src="{{ URL::asset('/js/jquery.min.js?v=2.1.4') }}"></script>
<script src="{{ URL::asset('/js/bootstrap.min.js?v=3.3.6') }}"></script>

<!-- 自定义js -->
<script src="{{ URL::asset('/js/content.js?v=1.0.0') }}"></script>

<!-- From Builder -->
<script src="{{ URL::asset('/js/beautifyhtml.js') }}"></script>
<!--登录-->
<div class="wrap" id="wrap">
 <form id="myform" name="myform" action="{{ URL::route('crowdfunding/cfdoproduct') }}" method="post" enctype="multipart/form-data">
		<div class="tdbModule proInfo" id="pro">
			<div class="proTitle">项目信息</div>
				<div class="registerCont">
					<div class="col-sm-12 col-sm-offset-3">
						<!-- 设置封面 -->
						<div class="form-group" style="margin-left:-245px;">
						     <label class="col-sm-1 control-label">设置封面：</label>
						  	 <div class="col-sm-9" style="margin-bottom:30px;">
							 	<input name="cf_cover" id="cf_cover" type="file" >
							 </div>
					     </div>
						<!-- 项目标题 -->
					    <div class="form-group" style="margin-left:-245px;">
					        <label class="col-sm-3 control-label">项目标题：</label>
					        <div class="col-sm-9" style="margin-bottom:30px;">
					            <input name="cf_title" id="cf_title" class="form-control" style="width:800px;margin-left:-235px;" placeholder="给自己的项目取个响亮的名字吧！注意不要超过50个汉字哦~" type="text"><span style="margin-left:495px;color:#444444;">还可以输入<span id="titleword" style="color:red;">50</span>个字</span>
					        </div>
					    </div>
					    <!-- 筹款目的 -->
					    <div class="form-group" style="margin-left:-245px;">
					        <label class="col-sm-3 control-label">筹款目的：</label>
					        <div class="col-sm-9">
						    <textarea class="form-control" rows="3" style="width:800px;margin-left:-235px;" name="cf_description" id="cf_description" placeholder="一句话简单介绍下你的项目吧！"></textarea> <span style="margin-left:495px;color:#444444;">还可以输入<span id="descriptionword" style="color:red;">100</span>个字</span>
						  	</div> 
					    </div>
					    <!-- 项目地点 -->
						<script type="text/javascript" src="{{ URL::asset('/js/jsAddress.js') }}"></script>
						    <div class="form-group" style="margin-left:-245px;">
						        <label class="col-sm-3 control-label" style="margin-top:30px;">项目地点：</label>
						        <div class="col-sm-9" style="margin-top:20px;margin-left:-235px;">
							        省：<select id="cmbProvince" name="cmbProvince" style="width:120px;height:35px;"  class="inline form-control"></select>
									市：<select id="cmbCity" name="cmbCity" style="width:120px;height:35px;"  class="center-block inline form-control"></select>
									区：<select id="cmbArea" name="cmbArea" style="width:120px;height:35px;" class="center-block inline form-control"></select>
        						</div>
    						</div>
						<script type="text/javascript">
						addressInit('cmbProvince', 'cmbCity', 'cmbArea');
						</script>
					    <!-- 筹款金额 -->
					    <div class="form-group" style="margin-left:-245px;">
					        <label class="col-sm-3 control-label" style="margin-top:20px;">筹款金额：</label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_financing_amount" id="cf_financing_amount" class="form-control" style="width:800px;margin-left:-235px;" placeholder="输入你需要筹资的金额，最低500元！" type="text">
					        </div>
					    </div>
					    <!-- 筹款周期： -->
					    <div class="form-group" style="margin-left:-245px;">
					        <label class="col-sm-3 control-label" style="margin-top:20px;">筹款周期：</label>
					        <div class="col-sm-9" style="margin-top:20px;">
						        <script type="text/javascript" src="{{ URL::asset('/js/jquery-1.4.2.min.js') }}"></script>
									<script type="text/javascript" src="{{ URL::asset('/js/jquery.datePicker-min.js') }}"></script>
									<link type="text/css" href="{{ URL::asset('/css/datepickers.css') }}" rel="stylesheet" />
									<script type="text/javascript">
									$(document).ready(function(){

										$(".datepicker").datePicker({
											inline:true,
											selectMultiple:false
										});
										
										$("#datepicker").datePicker({
											clickInput:true
										});
										$("#datepicke").datePicker({
											clickInput:true
										});
										
									});

									</script>
									<input type="text" name="cf_start_time" style="margin-left:-235px;" placeholder="点击选择时间" value="" id="datepicker" /> ~ <input type="text" name="cf_end_time" value="" id="datepicke" placeholder="点击选择时间"/>
									
						            <p style="margin-left:-235px;margin-top:15px;"><span style="color:red;">*</span>注：筹资时间周期，10~59天！</p>  
					        </div>
					    </div>
					</div>
				</div>	
			</div>

			<div class="tdbModule descInfo">
				<div class="descTitle">详细信息</div>
					<div class="registerCont">
						<div class="col-sm-12 col-sm-offset-3">
								<!-- 我需要更多的支持： -->
						    <div class="form-group" style="margin-left:-245px;">
						        <label class="col-sm-3 control-label">我需要更多的支持：</label>
						        <div class="col-sm-9" style="margin-bottom:30px;">
						            <input name="cf_reinforce_title" id="cf_reinforce_title" class="form-control" style="width:800px;margin-left:-235px;" placeholder="我需要更多的支持" type="text"><span style="margin-left:495px;color:#444444;">还可以输入<span id="moreword" style="color:red;">50</span>个字</span>
						        </div>
						    </div>
						   
						    <div class="form-group" style="margin-left:-245px;">
						        <label class="col-sm-3 control-label"></label>
						        <div class="col-sm-9">
							    <textarea class="form-control" rows="3" style="width:800px;margin-left:-235px;margin-bottom:20px;" name="cf_reinforce_content" id="cf_reinforce_content" placeholder="告诉支持者，你美妙的梦想或残酷的现实，为什么需要大家的支持"></textarea> 
							  	</div> 
						    </div>
						    <!-- 我提供的项目回报： -->
						    <div class="form-group" style="margin-left:-245px;">
						        <label class="col-sm-3 control-label">我提供的项目回报：</label>
						        <div class="col-sm-9" style="margin-bottom:30px;">
						            <input name="cf_investreward_title" id="cf_investreward_title" class="form-control" style="width:800px;margin-left:-235px;" placeholder="我提供的项目回报" type="text"><span style="margin-left:495px;color:#444444;">还可以输入<span id="proretitleword" style="color:red;">50</span>个字</span>
						        </div>
						    </div>
						  
						    <div class="form-group" style="margin-left:-245px;">
						        <label class="col-sm-3 control-label"></label>
						        <div class="col-sm-9">
							    <textarea class="form-control" rows="3" style="width:800px;margin-left:-235px;margin-bottom:20px;" name="cf_investreward_content" id="cf_investreward_content" placeholder="为了感谢大家的支持，你应该准备一些回报，回报内容除了详细的文字描述和清晰美观的图片，也不要忘记写上发出回报的时间。"></textarea> <span></span>
							  	</div> 
						    </div>
						    <!-- 关于我： -->
						    <div class="form-group" style="margin-left:-245px;">
						        <label class="col-sm-3 control-label">关于我们：</label>
						        <div class="col-sm-9" style="margin-bottom:30px;">
						            <input name="cf_aboutus_title" id="cf_aboutus_title" class="form-control" style="width:800px;margin-left:-235px;" placeholder="关于我~" type="text"><span style="margin-left:495px;color:#444444;">还可以输入<span id="abouttitleword" style="color:red;">50</span>个字</span>
						        </div>
						    </div>
					
						    <div class="form-group" style="margin-left:-245px;">
						        <label class="col-sm-3 control-label"></label>
						        <div class="col-sm-9">
							    <textarea class="form-control" rows="3" style="width:800px;margin-left:-235px;margin-bottom:20px;" name="cf_aboutus_content" id="cf_aboutus_content" placeholder="介绍自己和你项目团队的成员，请使用真诚质朴的文字"></textarea>
							  	</div> 
						    </div>
						    <div class="form-group" style="margin-left:-245px;">
						    	<label class="col-sm-1 control-label">图片详情：</label>
						    	 <input type="file"  multiple="multiple" name="cf_desc_image[]">
							  </div>
						  </div>
						</div>
					</div>	
				</div>
				<div class="tdbModule setReward" id="setReward">
					<div class="rewardTitle">回报设置</div>
						<div class="registerCont">
							<div class="col-sm-12 col-sm-offset-3">
								<div class="col-md-12">	   
									<!-- 我需要更多的支持： -->
						    		<div class="form-group" style="margin-left:-260px;">
								       <label class="col-sm-2 control-label">支持金额：</label>
								        <div class="col-sm-9" style="margin-bottom:30px;">
								            <input name="cf_supportamount" id="cf_supportamount" class="form-control" style="width:800px;margin-left:-165px;" placeholder="输入需要用户支持的金额(必填)" type="text">
								        </div>
								    </div>
	 								<!-- 我提供的项目回报： -->
								    <div class="form-group" style="margin-left:-260px;">
								        <label class="col-sm-2 control-label">回报标题：</label>
								        <div class="col-sm-9" style="margin-bottom:30px;">
								            <input name="cf_reward_title" id="cf_reward_title" class="form-control" style="width:800px;margin-left:-165px;" placeholder="输入回报标题（必填）" type="text"><span style="margin-left:565px;color:#444444;">还可以输入<span id="retitleword" style="color:red;">50</span>个字</span>
								        </div>
								    </div>
					  
								    <div class="form-group" style="margin-left:-260px;">
								        <label class="col-sm-2 control-label">回报内容：</label>
								        <div class="col-sm-9">
									    <textarea class="form-control" rows="3" style="width:800px;margin-left:-165px;" name="cf_reward_content" id="cf_reward_content" placeholder="回报内容（必填)"></textarea> <span style="margin-left:540px;color:#444444;">还可以输入<span id="recontentword" style="color:red;">500</span>个字</span>
									  	</div> 
								    </div>
								    <!-- 人数上限 -->
						    		<div class="form-group" style="margin-left:-260px;">
								        <label class="col-sm-2 control-label" style="margin-top:20px;">人数上限：</label>
								        <div class="col-sm-9" style="margin-bottom:30px;">
								            <input name="cf_person_num" id="cf_person_num" class="form-control" style="width:800px;margin-left:-165px;margin-top:20px;" placeholder="0为不限名额" type="text">
								        </div>
								    </div>
								    <!-- 回报周期 -->
						    		<div class="form-group" style="margin-left:-260px;">
								        <label class="col-sm-2 control-label">回报时间：</label>
								        <div class="col-sm-9" style="margin-bottom:30px;">
								            <input name="cf_reward_period" id="cf_reward_period" class="form-control" style="width:800px;margin-left:-165px;" placeholder="为项目结束后立即发送" type="text">
								        </div>
								    </div>
								    <!-- 回报图片 -->
									<div class="form-group" style="margin-left:-260px;">
									     <label class="col-sm-2 control-label">上传图片：</label>
									  	 <div class="col-sm-9" style="margin-bottom:30px;">
										 	<input name="cf_reward_image" id="cf_reward_image" type="file" >
										 </div>
								     </div>
								     <!-- 选择回报类型 -->
								     <div class="form-group" style="margin-left:-260px;">
								        <label class="col-sm-2 control-label">选择回报类型：</label>
								        <div class="col-sm-9" style="margin-bottom:10px;">
								            <label class="radio-inline">
								                <input checked="" value="实物回报（回报需邮寄）" id="cf_reward_type" name="cf_reward_type" type="radio" >实物回报（回报需邮寄)</label>
								            <label class="radio-inline">
								                <input value="虚拟回报（回报无需邮寄）" id="cf_reward_type" name="cf_reward_type" type="radio" >虚拟回报（回报无需邮寄）</label>      
								        </div>
								    </div>
								</div>
							</div>
						</div>	
					</div>
		 		</div>
		 	</div>
		</div>
	<input type="submit" class="btn btn-primary" style="margin-left:325px;width:50px;"  value="完成">
	<input type="button" class="btn btn-primary" style="margin-left:25px;width:120px;" id="continue" value="继续添加新的回报">
 </form>
</div>
<script type="text/javascript">
	$("#continue").click(function()
	{
		var str='';
			str+='<div class="tdbModule setReward" id="againsetReward">';
			str+='<div class="againrewardTitle">回报设置<input type="button" class="btn btn-primary" style="margin-left:825px;width:50px;" id="delete" value="删除"></div>';
			str+='<div class="registerCont">';
			str+='<div class="col-sm-12 col-sm-offset-3">';
			str+='<div class="col-md-12">';
			str+='<div class="form-group" style="margin-left:-260px;"><label class="col-sm-2 control-label">支持金额：</label><div class="col-sm-9" style="margin-bottom:30px;"><input name="cf_reinforce_title" id="cf_reinforce_title" class="form-control" style="width:800px;margin-left:-115px;" placeholder="输入需要用户支持的金额(必填)" type="text"><span></span></div></div>';
			str+='<div class="form-group" style="margin-left:-260px;"><label class="col-sm-2 control-label">回报标题：</label><div class="col-sm-9" style="margin-bottom:30px;"><input name="cf_investreward_title" id="cf_investreward_title" class="form-control" style="width:800px;margin-left:-115px;" placeholder="输入回报标题（必填）" type="text"><span></span></div></div><div class="form-group" style="margin-left:-260px;"><label class="col-sm-2 control-label">回报内容：</label><div class="col-sm-9"><textarea class="form-control" rows="3" style="width:800px;margin-bottom:20px;margin-left:-115px;" name="cf_investreward_content" id="cf_investreward_content" placeholder="回报内容（必填)"></textarea> <span></span></div> </div>';
			str+='<div class="form-group" style="margin-left:-260px;"><label class="col-sm-2 control-label">人数上限：</label><div class="col-sm-9" style="margin-bottom:30px;"><input name="cf_reinforce_title" id="cf_reinforce_title" class="form-control" style="width:800px;margin-left:-115px;" placeholder="0" type="text"><span></span></div></div>';
			str+='<div class="form-group" style="margin-left:-260px;"><label class="col-sm-2 control-label">回报时间：</label><div class="col-sm-9" style="margin-bottom:30px;"><input name="cf_reinforce_title" id="cf_reinforce_title" class="form-control" style="width:800px;margin-left:-115px;" placeholder="0" type="text"><span></span></div></div>';
			str+='<div class="form-group" style="margin-left:-260px;"><label class="col-sm-2 control-label">上传图片：</label><div class="col-sm-9" style="margin-bottom:30px;"><input name="cf_cover" id="cf_cover" type="file" ></div></div>';
			str+='<div class="form-group" style="margin-left:-260px;"><label class="col-sm-2 control-label">选择回报类型：</label><div class="col-sm-9" ><label class="radio-inline"><input checked="" value="option1" id="optionsRadios1" name="optionsRadios" type="radio" >实物回报（回报需邮寄)</label><label class="radio-inline"><input value="option2" id="optionsRadios2" name="optionsRadios" type="radio" >虚拟回报（回报无需邮寄）</label></div></div>';
			str+='</div>';
			str+='</div>';
			str+='</div>';
			str+='</div>';
		$("#setReward").append(str);
		$("#continue").attr('disabled', 'true');
		$("#delete").click(function()
		{
			$("#againsetReward").remove();	
			$("#continue").removeAttr("disabled");
		});
		
	});

	 $("#cf_title").keyup(function()
	 {  
	 	var title=$("#cf_title").val().length;
	 	// alert(title);
       if(title > 50){
           $("#cf_title").val( $("#cf_title").val().substring(0,50) );
           alert("您输入的标题字数已超过50,不可以再输入了哦~");
       }
       var newtitleword=50 - $("#cf_title").val().length;
       $("#titleword").text(newtitleword);
    });

	  $("#cf_description").keyup(function()
	 {  
	 	var description=$("#cf_description").val().length;
	 	// alert(title);
       if(description > 100){
           $("#cf_description").val( $("#cf_description").val().substring(0,100) );
           alert("您输入的标题字数已超过100,不可以再输入了哦~");
       }
       var newdescriptionword=100 - $("#cf_description").val().length;
       $("#descriptionword").text(newdescriptionword);
    });

	$("#cf_reinforce_title").keyup(function()
	 {  
	 	var title=$("#cf_reinforce_title").val().length;
	 	// alert(title);
       if(title > 50){
           $("#cf_reinforce_title").val( $("#cf_reinforce_title").val().substring(0,50) );
           alert("您输入的标题字数已超过50,不可以再输入了哦~");
       }
       var newmoretitleword=50 - $("#cf_reinforce_title").val().length;
       $("#moreword").text(newmoretitleword);
    });

	$("#cf_investreward_title").keyup(function()
	 {  
	 	var title=$("#cf_investreward_title").val().length;
	 	// alert(title);
       if(title > 50){
           $("#cf_investreward_title").val( $("#cf_investreward_title").val().substring(0,50) );
           alert("您输入的标题字数已超过50,不可以再输入了哦~");
       }
       var newproretitleword=50 - $("#cf_investreward_title").val().length;
       $("#proretitleword").text(newproretitleword);
    });

    $("#cf_aboutus_title").keyup(function()
	 {  
	 	var title=$("#cf_aboutus_title").val().length;
	 	// alert(title);
       if(title > 50){
           $("#cf_aboutus_title").val( $("#cf_aboutus_title").val().substring(0,50) );
           alert("您输入的标题字数已超过50,不可以再输入了哦~");
       }
       var newabouttitleword=50 - $("#cf_aboutus_title").val().length;
       $("#abouttitleword").text(newabouttitleword);
    });

	$("#cf_reward_title").keyup(function()
	 {  
	 	var title=$("#cf_reward_title").val().length;
	 	// alert(title);
       if(title > 50){
           $("#cf_reward_title").val( $("#cf_reward_title").val().substring(0,50) );
           alert("您输入的标题字数已超过50,不可以再输入了哦~");
       }
       var newretitleword=50 - $("#cf_reward_title").val().length;
       $("#retitleword").text(newretitleword);
    });

	 $("#cf_reward_content").keyup(function()
	 {  
	 	var description=$("#cf_reward_content").val().length;
	 	// alert(title);
       if(description > 500){
           $("#cf_reward_content").val( $("#cf_reward_content").val().substring(0,500) );
           alert("您输入的标题字数已超过500,不可以再输入了哦~");
       }
       var newcontentword=500 - $("#cf_reward_content").val().length;
       $("#recontentword").text(newcontentword);
    });

	 $("#cf_supportamount").blur(function()
	{
		$("#supportamount_error").remove();
		
		//接值
		var supportamount=$(this).val();
		var supportamount_ver=/^[0-9]{1,6}$/;
		// alert(number);		
        if(!supportamount_ver.test(supportamount))
        {
        	$(this).parent().append("<span id='supportamount_error' style='color: red;font-weight:blod;margin-left:-165px;'>请检查支持金格式(只能为整数,最高为999999元)</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查格式是否正确");
        		return false;
        	});
        	return false;
        }
        else
        {
            $(this).parent().append("<span id='supportamount_error' style='color:green;font-size:20px;margin-left:-165px;'>√</span>");
            $("#myform").unbind('submit'); 
            $("#myform").submit(function()
        	{
        		return true;
        	});	   
        }
	});
	  $("#cf_financing_amount").blur(function()
	{
		$("#financing_amount_error").remove();
		
		//接值
		var financing_amount=$(this).val();
		var financing_amount_ver=/^[0-9]{1,13}$/;
		// alert(number);		
        if(!financing_amount_ver.test(financing_amount))
        {
        	$(this).parent().append("<span id='financing_amount_error' style='color: red;font-weight:blod;margin-left:-235px;'>请输入正确的筹资金格式</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查格式是否正确");
        		return false;
        	});
        	return false;
        }
        else
        {
            $(this).parent().append("<span id='financing_amount_error' style='color:green;font-size:20px;margin-left:-235px;'>√</span>");
            $("#myform").unbind('submit'); 
            $("#myform").submit(function()
        	{
        		return true;
        	});	   
        }
	});

	  $("#datepicke").blur(function()
	{
		// alert(1);

		$("#time_error").remove();
		
		//接值
		var cf_end_time=$(this).val();
		var cf_start_time=$('#datepicker').val(); 
		var start=Date.parse(new Date(cf_start_time));
		var end=Date.parse(new Date(cf_end_time));
		var days=parseInt((end-start) / (1000 * 60 * 60 * 24));
		// alert(cf_start_time);
		// alert(cf_start_time);	
		// alert(cf_end_time);	
		// alert(days);
		
        if(start==end)
        {
        	$(this).parent().append("<span id='time_error' style='color: red;font-weight:blod;margin-left:-235px;'>开始时间与结束时间不能为同一天</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查格式是否正确");
        		return false;
        	});
        	return false;
        }
        if(days<10 || days>59)
        {
        	$(this).parent().append("<span id='time_error' style='color: red;font-weight:blod;margin-left:-235px;'>少于或超过筹资周期</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查格式是否正确");
        		return false;
        	});
        	return false;
        }
	});
	$("#cf_person_num").blur(function()
	{
		$("#person_num_error").remove();
		
		//接值
		var person_num=$(this).val();
		var person_num_ver=/^[0-9]{1,3}$/;
		// alert(number);		
        if(!person_num_ver.test(person_num))
        {
        	$(this).parent().append("<span id='person_num_error' style='color: red;font-weight:blod;margin-left:-165px;margin-top:20px;'>请检查输入的人数格式</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查格式是否正确");
        		return false;
        	});
        	return false;
        }
       
        else
        {
            $(this).parent().append("<span id='person_num_error' style='color:green;font-size:20px;margin-left:-165px;'>√</span>");
            $("#myform").unbind('submit'); 
            $("#myform").submit(function()
        	{
        		return true;
        	});	   
        }
	});
	$("#cf_reward_period").blur(function()
	{
		$("#reward_period_error").remove();
		
		//接值
		var reward_period=$(this).val();
		var reward_period_ver=/^[0-9]{1,3}$/;
		// alert(number);		
        if(!reward_period_ver.test(reward_period))
        {
        	$(this).parent().append("<span id='reward_period_error' style='color: red;font-weight:blod;margin-left:-165px;'>请检查输入的周期格式</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查格式是否正确");
        		return false;
        	});
        	return false;
        }
        
        else
        {
            $(this).parent().append("<span id='reward_period_error' style='color:green;font-size:20px;margin-left:-165px;'>√</span>");
            $("#myform").unbind('submit'); 
            $("#myform").submit(function()
        	{
        		return true;
        	});	   
        }
	});

	 $("#myform").submit(function()
	{
		
		var cf_title=$("#cf_title").val();
		var cf_description=$("#cf_description").val();
		var cf_financing_amount=$("#cf_financing_amount").val();
		var cf_start_time=$("#datepicker").val();
		var cf_end_time=$("#datepicke").val();
		var cf_reinforce_title=$("#cf_reinforce_title").val();
		var cf_reinforce_content=$("#cf_reinforce_content").val();
		var cf_investreward_title=$("#cf_investreward_title").val();
		var cf_investreward_content=$("#cf_investreward_content").val();
		var cf_aboutus_title=$("#cf_aboutus_title").val();
		var cf_aboutus_content=$("#cf_aboutus_content").val();		
		var cf_reward_title=$("#cf_reward_title").val();
		var cf_reward_content=$("#cf_reward_content").val();
		var cf_supportamount=$("#cf_supportamount").val();
		var cf_person_num=$("#cf_person_num").val();
		var cf_reward_period=$("#cf_reward_period").val();

		if(cf_title=="" || cf_description=="" || cf_financing_amount=="" || cf_start_time=="" || cf_end_time=="" || cf_reinforce_title=="" || cf_reinforce_content=="" ||  cf_investreward_title=="" || cf_investreward_content=="" || cf_aboutus_title=="" || cf_aboutus_content=="" || cf_investreward_content=="" || cf_reward_title=="" || cf_reward_content=="" || cf_person_num=="" || cf_reward_period=="")
		{
			alert("请将信息添加完整再提交");
			return false;
		}

	});


</script>
@endsection