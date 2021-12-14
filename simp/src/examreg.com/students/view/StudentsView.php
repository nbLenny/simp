<?php


namespace students\view;


class StudentsView {
    public function __construct() {}

    public function __destruct() {}

    /**
     * Tạo cảnh báo bằng javascript.
     * @param $message: Lời nhắn
     * @return string:
     */
    public function alert($message) {
        return "<script>window.alert(\"".$message."\");</script>";
    }

    /**
     * Bảng danh sách sinh viên
     * @return string: HTML
     */
    public function tableSinhvienView($input) {
        $data = json_decode($input, true);

        $html = "<table id='tablesinhvien' class='table table-bordered table-striped table-hover table-sm'><thead><tr>";
        $html .= "<th class='th-sm'>Mã sinh viên</th>";
        $html .= "<th class='th-sm'>Họ đệm</th>";
        $html .= "<th class='th-sm'>Tên</th>";
        $html .= "<th class='th-sm'>Ngày sinh</th>";
        $html .= "<th class='th-sm'>Đủ điều kiện dự thi</th>";
        $html .= "</tr></thead><tbody>";
        $size = sizeof($data); // Chứa kích cỡ mảng data
        if ($size > 0) { // Trả về dữ liệu nếu size > 0
            foreach ($data as $key => $value) {
                $html .= "<tr>";
                $html .= "<td>" . $value["id"] . "</td>";
                $html .= "<td>" . $value["hodem"] . "</td>";
                $html .= "<td>" . $value["ten"] . "</td>";
                $html .= "<td>" . $value["ngaysinh"] . "</td>";
                $html .= "<td>" . $value["dudieukienduthi"] . "</td>";
                $html .= "</tr>";
            }
        }
        $html .= "</tbody><tfoot><tr>";
        $html .= "<th>Mã sinh viên</th><th>Họ đệm</th><th>Tên</th><th>Ngày sinh</th><th>Đủ điều kiện dự thi</th>";
        $html .= "</tr></tfoot></table>";

        return $html;
    }

   
}
