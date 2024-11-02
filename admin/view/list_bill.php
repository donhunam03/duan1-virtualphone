    <?php include_once "header.php" ?>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <?php include_once "nav.php" ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Hóa Đơn</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table1">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <!-- <th scope="col">Mã Bill</th> -->
                                        <th scope="col">Người đặt</th>
                                        <th scope="col">Thành tiền</th>
                                        <th scope="col">Phương thức thanh toán</th>
                                        <th scope="col">Trạng thái thanh toán</th>
                                        <th scope="col">Trạng thái đơn hàng</th>
                                        <th scope="col">Ngày đặt</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($listbill as $bill) :
                                        extract($bill);
                                        $user_detail = '' . $bill['user_name'] . '<br>' . $bill['full_name'] . '<br> ' . $bill['email'] . '<br> ' . $bill['address'] . '<br>0' . $bill['phone'] . '<br> 
                                        </td>'
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <!-- <td><?= $bill['id_bill'] ?></td> -->
                                            <td><?= $bill['full_name'] ?></td>
                                            <td><?= number_format($bill['total_amount']) ?></td>
                                            <td><?php if ($bill['payment'] == 1) {
                                                    echo "Thanh toán khi nhận hàng";
                                                } else if ($bill['payment'] == 2) {
                                                    echo "Chuyển khoản ngân hàng";
                                                } else if ($bill['payment'] == 3) {
                                                    echo "Thanh toán Online";
                                                } else {
                                                    echo "Không tìm thấy phương thức thanh toán";
                                                }  ?></td>
                                            <td><?php if ($bill['status_pay'] == 0) {
                                                    echo "<span class='badge badge-warning'>Chưa thanh toán</span>";
                                                } else if ($bill['status_pay'] == 1) {
                                                    echo "<span class='badge badge-success'>Đã thanh toán</span>";
                                                } else {
                                                    echo "Không tìm thấy phương thức thanh toán";
                                                }  ?></td>
                                            <td><?php if ($bill['status'] == 0) {
                                                    echo "<span class='badge badge-danger'>Đơn Hủy</span>";
                                                } else if ($bill['status'] == 1) {
                                                    echo "<span class='badge badge-warning'>Đang xử lý</span>";
                                                } else if ($bill['status'] == 2 || $bill['status'] == 3) {
                                                    echo "<span class='badge badge-primary'>Đang giao hàng</span>";
                                                } elseif ($bill['status'] == 4) {
                                                    echo "<span class='badge badge-warning'>Chờ người mua xác nhận</span>";
                                                } elseif ($bill['status'] == 5) {
                                                    echo "<span class='badge badge-success'>Đã bán</span>";
                                                } ?></td>
                                             <td><span class="badge badge-dark"><?= $bill['order_date'] ?></span></td>

                                            <td class="text-center">
                                                <?php if($bill['status'] == 0) : ?>
                                                    <button type="button" class="btn btn-danger" disabled>Đã Hủy</button>

                                                <?php endif; ?>
                                                <?php if($bill['status'] == 1) : ?>
                                                    <a href="?act=update_nhan_admin&id=<?=$bill['id_bill']?>" onclick="return confirm('Xác nhận đã chuyển cho đơn vị vận chuyển ?')"><button type="button" class="btn btn-success"> Xác nhận đơn</button></a>
                                                    <a href="?act=deleted_bill_admin&id=<?=$bill['id_bill']?>" onclick="return confirm('Bạn muốn hủy đơn hàng này chứ ?')"><button type="button" class="btn btn-danger">Hủy Đơn</button></a>
                                                <?php endif; ?>
                                                <?php if($bill['status'] == 2) : ?>
                                                    <a href="?act=update_giao_admin&id=<?=$bill['id_bill']?>" onclick="return confirm('Xác nhận đã chuyển cho đơn vị vận chuyển ?')"><button type="button" class="btn btn-success">Xác nhận giao hàng</button></a>
                                                <?php endif; ?>
                                                <?php if($bill['status'] == 3) : ?>
                                                    <button type="button" class="btn btn-success" disabled>Đang giao</button>
                                                <?php endif; ?>
                                                <?php if($bill['status'] == 4) : ?>
                                                    <button type="button" class="btn btn-success" disabled>Chờ người mua xác nhận</button>
                                                <?php endif; ?>
                                                <?php if($bill['status'] == 5) : ?>
                                                    <button type="button" class="btn btn-success" disabled>Đã bán</button>
                                                <?php endif; ?>
                                                <a type="button" href="index.php?act=edit_bill&idbill=<?= $bill['id_bill'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i>
                                                </a>
                                                <!-- <button onClick="window.print()" class="btn btn-danger"><i class="fa-solid fa-print"></i></button> -->
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <script>
            $(document).ready(function() {
                $('#table1').DataTable();
            });
        </script>
        <!-- End of Main Content -->
        <?php include_once "footer.php" ?>