@extends("layouts.admin")
@section('content')
    <style>

        .recent_heading h4 {
            color: #0465ac;
            font-size: 16px;
            margin: auto;
            line-height: 29px;
        }

        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }

        .chat_ib p {
            font-size: 12px;
            color: #989898;
            margin: auto;
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .chat_img {
            float: left;
            width: 11%;
        }

        .chat_img img {
            width: 100%
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .incoming_msg_img img {
            width: 100%;
        }

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 0 15px 15px 15px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: 57%;
        }

        .mesgs{
            float: left;
            padding: 30px 15px 0 25px;
            width:100%;
        }

        .sent_msg p {
            background:#0465ac;
            border-radius: 12px 15px 15px 0;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }

        .sent_msg {
            float: right;
            width: 46%;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
            outline:none;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .msg_send_btn {
            background: #01c0c8 none repeat scroll 0 0;
            border:none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 15px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            height: auto;
            overflow-y: auto;
        }
    </style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="mesgs">
                <div class="msg_history">
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>Test which is a new approach to have all
                                    solutions</p>
                                <span class="time_date"> 11:01 AM    |    June 9</span></div>
                        </div>
                    </div>
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>Test which is a new approach to have all
                                solutions</p>
                            <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                    </div>
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input type="text" class="write_msg" placeholder="Type a message" />
                        <button class="msg_send_btn" ><i class="fa fa-paper-plane"></i></button>
                        <button style="right: 40px" class="msg_send_btn"><i class="fa fa-file"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
