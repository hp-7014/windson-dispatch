<?php
    session_start();
    include '../database/connection.php';
?>

<div id="Status_Type" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Status Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="status-container" style="z-index: 1800"></div>
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll-s" class="table-scroll-s">
                            <table id="status_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Status Name</th>
                                        <th>Status Color</th>
                                    </tr>
                                </thead>

                                <tbody id="statusBody">
                                    <tr>
                                        <th>1</th>
                                        <td>Break Down</td>
                                        <td>
                                            <div class="Break_Down"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Loaded</td>
                                        <td>
                                            <div class="Loaded"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>Arrived Consignee</td>
                                        <td>
                                            <div class="Arrived_Consignee"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <td>Arrived Shipper</td>
                                        <td>
                                            <div class="Arrived_Shipper"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>5</th>
                                        <td>Paid</td>
                                        <td>
                                            <div class="Paid"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>6</th>
                                        <td>Open</td>
                                        <td>
                                            <div class="Open"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>7</th>
                                        <td>On Route</td>
                                        <td>
                                            <div class="On_Route"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>8</th>
                                        <td>Dispatched</td>
                                        <td>
                                            <div class="Dispatched"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>9</th>
                                        <td>Delivered</td>
                                        <td>
                                            <div class="Delivered"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>10</th>
                                        <td>Completed</td>
                                        <td>
                                            <div class="Completed"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>11</th>
                                        <td>Invoiced</td>
                                        <td>
                                            <div class="Invoiced"></div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Status Name</th>
                                        <th>Status Color</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>