{extend name="index/base" /}
{block name="tdk"}
	<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}

<!--招聘首页-->
<div class="zhaoBg contant">
	<div class="zhaoBgCon">
		<img src="<{$img}>/zhaoBan.png"/>
	</div>
</div>
<div class="zhaoBox contant">
	<div class="zhaoCon">
		<div class="erjiTit">
			<span class="rightnow">当前位置：<a href="<{:url('Job/index')}>">企业招聘</a></span>
		</div>
		<div class="zhaoList">
			<div class="zhaoListTit">
				<ul>
					<li class="job">招聘职位</li>
					<li class="company2">招聘单位</li>
					<li class="locations">地点</li>
					<li class="peopleNum">人数</li>
					<li class="money">期望月薪</li>
					<li class="gengTime">更新时间</li>
				</ul>
			</div>
			<div class="zhaoJobList">
				<ul>
					{volist name="joblist" id="v" key="i"}
					<li {if condition="$i%2==1"} class="recruitLi" {/if}>
						<ul class="jobList">
							<li class="job"><a href="#"><{$v.job_name}></a></li>
							<li class="company2"><a href="#"><{$v.companyInfo.company_name}></a></li>
							<li class="locations"><span><{$v.work_place}></span></li>
							<li class="peopleNum"><{$v.need_num}></li>
							<li class="money"><span><{$v.min_salary}>-<{$v.max_salary}></span></li>
							<li class="gengTime"><{$v.update_time|substr=0,10}></li>
							<li class="toudi">
								<input type="button" value="投递简历" />
							</li>
						</ul>
					</li>
					{/volist}
				</ul>
			</div>
			<!--分页-->
			<div class="pageList pageJs">
				<{$page}>
			</div>
		</div>
	</div>
</div>
{/block}