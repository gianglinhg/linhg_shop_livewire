<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

    body {
      background-color: #3e94ec;
      font-family: "Roboto", helvetica, arial, sans-serif;
      font-size: 16px;
      font-weight: 400;
      text-rendering: optimizeLegibility;
    }

    /*** Table Styles **/

    .table-fill {
      background: white;
      border-radius: 3px;
      border-collapse: collapse;
      height: 320px;
      margin: auto;
      max-width: 600px;
      padding: 5px;
      width: 100%;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      animation: float 5s infinite;
    }

    tr {
      border-top: 1px solid #C1C3D1;
      border-bottom-: 1px solid #C1C3D1;
      color: #666B85;
      font-size: 16px;
      font-weight: normal;
      text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
    }

    tr:hover td {
      background: #4E5066;
      color: #FFFFFF;
      border-top: 1px solid #22262e;
    }

    tr:first-child {
      border-top: none;
    }

    tr:last-child {
      border-bottom: none;
    }

    tr:nth-child(odd) td {
      background: #EBEBEB;
    }

    tr:nth-child(odd):hover td {
      background: #4E5066;
    }

    tr:last-child td:first-child {
      border-bottom-left-radius: 3px;
    }

    tr:last-child td:last-child {
      border-bottom-right-radius: 3px;
    }

    td {
      background: #FFFFFF;
      padding: 20px;
      text-align: left;
      vertical-align: middle;
      font-weight: 300;
      font-size: 18px;
      text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
      border-right: 1px solid #C1C3D1;
    }

    td:last-child {
      border-right: 0px;
    }

    td.text-left {
      text-align: left;
    }

    td.text-center {
      text-align: center;
    }

    td.text-right {
      text-align: right;
    }
  </style>
</head>

<body>
  <table class="table-fill">
    <tr>
      <td class="text-left">Tên</td>
      <td class="text-left">{{$name}}</td>
    </tr>
    <tr>
      <td class="text-left">Email</td>
      <td class="text-left">{{$email}}</td>
    </tr>
    <tr>
      <td class="text-left">Số điện thoại</td>
      <td class="text-left">{{$phone}}</td>
    </tr>
    <tr>
      <td class="text-left">Nội dung</td>
      <td class="text-left">{{session()->get('message')}}</td>
    </tr>
  </table>


</body>