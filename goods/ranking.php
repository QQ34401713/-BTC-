{template /common/header}
	<header>
		<a href="/" class="headerL iconfont">&#xe66a;</a>
		<h1>排行榜</h1>
	</header>
	<!-- E header -->
	<!-- S 我的直推战绩 -->
	<!-- <div class="jason_gains">
		<h2>我的直推战绩</h2>
		<ul class="flex flex-pack-justify jason_gains_con">
			<li class="item">
				<dl>
					<dt>3</dt>
					<dd>共直推好友</dd>
				</dl>
			</li>
			<li class="item">
				<dl>
					<dt>99+</dt>
					<dd>今日排名</dd>
				</dl>
			</li>
			<li class="item">
				<dl>
					<dt class="red">1235.00</dt>
					<dd>获得奖励</dd>
				</dl>
			</li>
		</ul>
		<a href="" class="checkBtn">查看详情</a>
	</div> -->
	<!-- E 我的直推战绩 -->
	<!-- S 今日排行榜 -->
	<div class="jason_today_ranking">
		<h2 class="h2">今日排行榜</h2>
		<ul class="jason_ranking_list">

		<?php foreach($list as $key=>$val){
// echo $key."<br>";
			?>	
			<li class="flex flex-pack-justify list">
				<div>

					<div class="fl rank">
						<?php if($key==0){?>
							<img src="{THEME_PATH}images/num1.png" alt="" width="20" class="num_img">
						<?php }elseif($key==1){?>
							<img src="{THEME_PATH}images/num2.png" alt="" width="20" class="num_img">
						<?php }elseif($key==2){?>
							<img src="{THEME_PATH}images/num3.png" alt="" width="20" class="num_img">
						<?php }else{echo $key+1;}?>
					</div>
					<div class="user fl">
						<img src="<?php echo get_avatar($val['ico']);?>" alt="" width="45" class="img-circle">
						<span class="name"><?php echo $val['username'];?><?php echo $val['invite_id'];?></span>
					</div>
				</div>
				<dl class="flex flex-v flex-pack-center right">
					<dt><?php echo $val['count'];?>人</dt>
					<dd>直推人数</dd>
				</dl>
			</li>
		<?php }?>

		</ul>
	</div>
	<!-- E 今日排行榜 -->
</body>
</html>