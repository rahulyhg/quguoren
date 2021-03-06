<?php $this->load->view('ckad/header') ?>

<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>
<div class="pro-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-picture"></i>操作</h2>

        </div>
        <div class="box-content">
			<?php if( isset($products) && !empty($products) ):?>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>项目名称</th>
                        <th>发起人</th>
                        <th>logo</th>
                        <th>预估总时间</th>
                        <th>已使用时间</th>
                        <th>项目地址</th>
                        <th>项目简介</th>
                        <th>募资期限</th>
                        <th>募资目标</th>
                        <th>访问次数</th>
                        <th>发起时间</th>
						<th>邮件提醒</th>
                        <th>操作</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($products as $pro) { ?>
                        <tr>
                            <td title="<?php echo $pro['name']; ?>">
                                <?php if (mb_strlen($pro['name']) < 9) echo $pro['name'];
                                else echo mb_substr($pro['name'], 0, 8) . "..."; ?>
                            
                            </td>
                            <td class="center"><?php echo $pro['username']; ?></td>
                            <td class="center">
                                <?php if ($pro['logo']): ?>
                                    <img class="avatar-medium" height="60" width="60" src="<?php echo strstr($pro['logo'], 'http://') ? $pro['logo'] : "./uploads/" . $pro['logo']; ?>">
    <?php endif; ?>
                            </td>
                            <td class="center"><?php echo $pro['all_time']; ?></td>
                            <td class="center"><?php echo $pro['used_time']; ?></td>
                            <td class="center"><?php echo $pro['province'] . "<br/>" . $pro['city']; ?></td>
                            <td class="center" title="<?php echo $pro['content']; ?>">
                                <?php if (mb_strlen($pro['content']) < 9) echo $pro['content'];else echo mb_substr($pro['content'], 0, 9) . "..."; ?>
                            </td>
                            <td class="center"><?php echo $pro['duration']; ?></td>
                            <td class="center"><?php echo $pro['goal']; ?></td>
                            <td class="center"><?php echo $pro['logs']; ?></td>
                            <td class="center"><?php echo $pro['ctime']; ?></td>  
							<td class="center"><?php if( $pro['failed_email'] == 1 ):?>已发送<?php else:?>未发送<?php endif;?></td>        
                            <td><?php if( $pro['failed_email'] == 0 ):?><a href="/ckad/send_email/<?php echo $pro['id']; ?>/<?php echo $pro['user_id'];?>">发送邮件</a><?php else:?>发送邮件<?php endif;?></td>
                        </tr>
<?php } ?>
                </tbody>
            </table>
					<div style="clear:both">
						<br/>
						 <?php if (isset($pagination)):?>
							<?php echo $pagination;?>
						 <?php endif;?>
					</div>				
			<?php else:?>
			<p>没有众筹失败的项目</p>
			<?php endif;?>
        </div>
    </div><!--/span-->

</div><!--/pro-->


<!-- content ends -->
<?php $this->load->view('ckad/footer')?>