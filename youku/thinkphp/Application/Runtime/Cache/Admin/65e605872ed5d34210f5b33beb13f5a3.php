<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Public/Admin/css/bootstrap.min.css">
    <title></title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="dataTables-example_length"><label>Show <select
                                        name="dataTables-example_length" aria-controls="dataTables-example"
                                        class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label></div>
                            </div>
                            <div class="col-sm-6">
                                <div id="dataTables-example_filter" class="dataTables_filter"><label>Search:<input
                                        type="search" class="form-control input-sm" placeholder=""
                                        aria-controls="dataTables-example"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                       id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending"
                                            style="width: 172px;">Rendering engine
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 204px;">Browser
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 185px;">Platform(s)
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending"
                                            style="width: 149px;">Engine version
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                            style="width: 110px;">CSS grade
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.7</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA even" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 2.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA even" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 3.0</td>
                                        <td>Win 2k+ / OSX.3+</td>
                                        <td class="center">1.9</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Camino 1.0</td>
                                        <td>OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA even" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Camino 1.5</td>
                                        <td>OSX.3+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Netscape 7.2</td>
                                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                                        <td class="center">1.7</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA even" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Netscape Browser 8</td>
                                        <td>Win 98SE+</td>
                                        <td class="center">1.7</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Netscape Navigator 9</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA even" role="row">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Mozilla 1.0</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1</td>
                                        <td class="center">A</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 pull-right">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous disabled" aria-controls="dataTables-example"
                                            tabindex="0" id="dataTables-example_previous"><a href="#">Previous</a></li>
                                        <li class="paginate_button active" aria-controls="dataTables-example"
                                            tabindex="0"><a href="#">1</a></li>
                                        <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a
                                                href="#">2</a></li>
                                        <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a
                                                href="#">3</a></li>
                                        <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a
                                                href="#">4</a></li>
                                        <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a
                                                href="#">5</a></li>
                                        <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a
                                                href="#">6</a></li>
                                        <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0"
                                            id="dataTables-example_next"><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

<script src="/Public/Admin/js/jquery-1.11.3.min.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js"></script>
<script>
    $(window).keyup(function (e)
    {
        console.log(typeof e.which);
    });
</script>

</body>
</html>