<?php include 'bookcon.php'?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Booking</title>
  
 <script src="https://cdn.jsdelivr.net/npm/web3@1.5.2/dist/web3.min.js"></script>

  <style>
	body{
		background-image: url('/background_image1.jpg');
		background-size: cover;
		background-repeat:no-repeat;
	}



	.header-bg h3{margin:7px 0; font-size: 17px;}
	.header-name span a i {color: #fff; padding-right: 20px;}


	#btn-des{
		color:#fff;
		background-color: #d9534f;
		padding:10px 17px;
		border-radius: 0px;
	}
	.header-bg h3 { float: left; color:#000; }

	.header-bg h3 + span {
		margin: 13px;
		display: block;
		float: left;
	}
	.header-bg {
		background-color: #fbda0a;
		min-height: 50px;
		color: #ffffff;
	}
	.content-left{
		background:#ececec!important;
	}
	.content-right{
		overflow-y:scroll;
		padding:20px 20px 60px 20px;
	}
	input[type="date"].form-control, input[type="time"].form-control, input[type="datetime-local"].form-control, input[type="month"].form-control { line-height: 18px; }
	#hide-flow{
		overflow: hidden!important;
	}
	#map-canvas{ max-height: 620px;
	display: flex;}
	.text-danger{
		font-size:14px;
	}
	.form-control{
		font-size:13px;
	}
	.select2-container .select2-selection--single .select2-selection__rendered{
		font-size:15px;
	}
	.padding-disable{
		padding:0px;
	}
	#priceS{
		font-size:16px;
	}
	.text-heavy{
		font-size:16px;
		vertical-align: baseline;
		margin-top: 6px;
	}
	.select2-results__options li{
		font-size: 14px;
	}
	.select2-container--default{
		width:100%!important;
	}

	.btn-success{
		background-color: #4CAF50; /* Green */
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
	}

	.main-page{
		height: 600px;
		border: 5px outset black;
		margin: 5% 25%;
		padding: 50px;
		box-shadow: 0 0 5rem black;
	}

	#payment-id{
		font-size: 40px;
		margin-left: 40%;
	}

</style>
</head>
<body >

   <div id=pay>  </div> 
  
     
     <br>


<div class="main-page">
    <form id="prescriptionForm" method='POST'>
        <h1>Prescription Form</h1>
        <label class="text-danger">Patient ID *</label>
        <input name="patientID" type="text" required>
        <br><br>
        <label class="text-danger">Patient Name *</label>
        <input name="patientName" maxlength="50" required class="form-control" type="text" placeholder="Enter Patient Name">
        <br><br>
        <label class="text-danger">Name of Healthcare provider</label>
        <input name="healthcareProvider"  required class="form-control" type="text" placeholder="Enter Healthcare Provider">
        <br><br>
        <label class="text-danger">Profession *</label>
        <select name="profession" required class="js-example-basic-single form-control" id="profession">
            <option>Select profession</option>
            <option value="pharmacist">Pharmacist</option>
            <option value="doctor">Doctor</option>
        </select>
        <br><br>
        <label class="text_danger">Date*</label>
        <input type="date" name="date" required>
        <label class="text_danger">Time*</label>
        <input type="time" name="time" required>
        <br><br>
        <label class="Duration">Duration*</label>
        <select name="duration" required class="form-control" id="duration">
            <option value="10">10 mins</option>
            <option value="20">20 mins</option>
            <option value="30">30 mins</option>
        </select>
        <br><br>
        <label class="text-danger">Hospital/Pharmacy name *</label>
        <input name="hospitalPharmacyName" maxlength="10" required class="form-control" type="text" placeholder="Enter Hospital/Pharmacy Name">
        <br><br>
        <label class="text-danger">Medicines *</label>
        <textarea name="medicines" required class="form-control" placeholder="Enter Medicines"></textarea>
        <br><br>
        <label class="text-danger">Prescription *</label>
        <textarea name="prescription" required class="form-control" placeholder="Enter Prescription"></textarea>
        <br><br>
        <input type="submit" name="Submit"class="btn-success" value="Submit">
    </form>
</div>

<script>
    window.addEventListener('load', async function() {
    // Checking if Web3 has been injected by the browser (Mist/MetaMask)
    if (typeof window.ethereum !== 'undefined') {
        window.web3 = new Web3(window.ethereum);
        // Listening for the 'disconnect' event instead of 'close'
        window.ethereum.on('disconnect', () => {
            console.log('MetaMask connection closed');
        });
    } else {
        console.log('No web3? You should consider trying MetaMask!');
    }

    // Contract ABI - Replace with your actual ABI
    const contractABI =[{
  "contractName": "PrescriptionContract",
  "abi": [
    {
      "constant": true,
      "inputs": [
        {
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "prescriptions",
      "outputs": [
        {
          "name": "patientID",
          "type": "string"
        },
        {
          "name": "patientName",
          "type": "string"
        },
        {
          "name": "healthcareProvider",
          "type": "string"
        },
        {
          "name": "profession",
          "type": "string"
        }
      ],
      "payable": false,
      "stateMutability": "view",
      "type": "function",
      "signature": "0x31dfc91b"
    },
    {
      "constant": false,
      "inputs": [
        {
          "name": "_patientID",
          "type": "string"
        },
        {
          "name": "_patientName",
          "type": "string"
        },
        {
          "name": "_healthcareProvider",
          "type": "string"
        },
        {
          "name": "_profession",
          "type": "string"
        }
      ],
      "name": "addPrescription",
      "outputs": [],
      "payable": false,
      "stateMutability": "nonpayable",
      "type": "function",
      "signature": "0x0581ee82"
    }
  ],
  "bytecode": "0x608060405234801561001057600080fd5b50610912806100206000396000f3fe60806040526004361061004c576000357c0100000000000000000000000000000000000000000000000000000000900463ffffffff1680630581ee821461005157806331dfc91b146102de575b600080fd5b34801561005d57600080fd5b506102dc6004803603608081101561007457600080fd5b810190808035906020019064010000000081111561009157600080fd5b8201836020820111156100a357600080fd5b803590602001918460018302840111640100000000831117156100c557600080fd5b91908080601f016020809104026020016040519081016040528093929190818152602001838380828437600081840152601f19601f8201169050808301925050505050505091929192908035906020019064010000000081111561012857600080fd5b82018360208201111561013a57600080fd5b8035906020019184600183028401116401000000008311171561015c57600080fd5b91908080601f016020809104026020016040519081016040528093929190818152602001838380828437600081840152601f19601f820116905080830192505050505050509192919290803590602001906401000000008111156101bf57600080fd5b8201836020820111156101d157600080fd5b803590602001918460018302840111640100000000831117156101f357600080fd5b91908080601f016020809104026020016040519081016040528093929190818152602001838380828437600081840152601f19601f8201169050808301925050505050505091929192908035906020019064010000000081111561025657600080fd5b82018360208201111561026857600080fd5b8035906020019184600183028401116401000000008311171561028a57600080fd5b91908080601f016020809104026020016040519081016040528093929190818152602001838380828437600081840152601f19601f8201169050808301925050505050505091929192905050506104d6565b005b3480156102ea57600080fd5b506103176004803603602081101561030157600080fd5b81019080803590602001909291905050506105a2565b6040518080602001806020018060200180602001858103855289818151815260200191508051906020019080838360005b83811015610363578082015181840152602081019050610348565b50505050905090810190601f1680156103905780820380516001836020036101000a031916815260200191505b50858103845288818151815260200191508051906020019080838360005b838110156103c95780820151818401526020810190506103ae565b50505050905090810190601f1680156103f65780820380516001836020036101000a031916815260200191505b50858103835287818151815260200191508051906020019080838360005b8381101561042f578082015181840152602081019050610414565b50505050905090810190601f16801561045c5780820380516001836020036101000a031916815260200191505b50858103825286818151815260200191508051906020019080838360005b8381101561049557808201518184015260208101905061047a565b50505050905090810190601f1680156104c25780820380516001836020036101000a031916815260200191505b509850505050505050505060405180910390f35b600060806040519081016040528086815260200185815260200184815260200183815250908060018154018082558091505090600182039060005260206000209060040201600090919290919091506000820151816000019080519060200190610541929190610841565b50602082015181600101908051906020019061055e929190610841565b50604082015181600201908051906020019061057b929190610841565b506060820151816003019080519060200190610598929190610841565b5050505050505050565b6000818154811015156105b157fe5b9060005260206000209060040201600091509050806000018054600181600116156101000203166002900480601f01602080910402602001604051908101604052809291908181526020018280546001816001161561010002031660029004801561065d5780601f106106325761010080835404028352916020019161065d565b820191906000526020600020905b81548152906001019060200180831161064057829003601f168201915b505050505090806001018054600181600116156101000203166002900480601f0160208091040260200160405190810160405280929190818152602001828054600181600116156101000203166002900480156106fb5780601f106106d0576101008083540402835291602001916106fb565b820191906000526020600020905b8154815290600101906020018083116106de57829003601f168201915b505050505090806002018054600181600116156101000203166002900480601f0160208091040260200160405190810160405280929190818152602001828054600181600116156101000203166002900480156107995780601f1061076e57610100808354040283529160200191610799565b820191906000526020600020905b81548152906001019060200180831161077c57829003601f168201915b505050505090806003018054600181600116156101000203166002900480601f0160208091040260200160405190810160405280929190818152602001828054600181600116156101000203166002900480156108375780601f1061080c57610100808354040283529160200191610837565b820191906000526020600020905b81548152906001019060200180831161081a57829003601f168201915b5050505050905084565b828054600181600116156101000203166002900490600052602060002090601f016020900481019282601f1061088257805160ff19168380011785556108b0565b828001600101855582156108b0579182015b828111156108af578251825591602001919060010190610894565b5b5090506108bd91906108c1565b5090565b6108e391905b808211156108df5760008160009055506001016108c7565b5090565b9056fea165627a7a72305820a60c487fd50963353287548e14b429de50ca94cf12505cbccd34107d00c314990029",
  "deployedBytecode": "0x60806040526004361061004c576000357c0100000000000000000000000000000000000000000000000000000000900463ffffffff1680630581ee821461005157806331dfc91b146102de575b600080fd5b34801561005d57600080fd5b506102dc6004803603608081101561007457600080fd5b810190808035906020019064010000000081111561009157600080fd5b8201836020820111156100a357600080fd5b803590602001918460018302840111640100000000831117156100c557600080fd5b91908080601f016020809104026020016040519081016040528093929190818152602001838380828437600081840152601f19601f8201169050808301925050505050505091929192908035906020019064010000000081111561012857600080fd5b82018360208201111561013a57600080fd5b8035906020019184600183028401116401000000008311171561015c57600080fd5b91908080601f016020809104026020016040519081016040528093929190818152602001838380828437600081840152601f19601f820116905080830192505050505050509192919290803590602001906401000000008111156101bf57600080fd5b8201836020820111156101d157600080fd5b803590602001918460018302840111640100000000831117156101f357600080fd5b91908080601f016020809104026020016040519081016040528093929190818152602001838380828437600081840152601f19601f8201169050808301925050505050505091929192908035906020019064010000000081111561025657600080fd5b82018360208201111561026857600080fd5b8035906020019184600183028401116401000000008311171561028a57600080fd5b91908080601f016020809104026020016040519081016040528093929190818152602001838380828437600081840152601f19601f8201169050808301925050505050505091929192905050506104d6565b005b3480156102ea57600080fd5b506103176004803603602081101561030157600080fd5b81019080803590602001909291905050506105a2565b6040518080602001806020018060200180602001858103855289818151815260200191508051906020019080838360005b83811015610363578082015181840152602081019050610348565b50505050905090810190601f1680156103905780820380516001836020036101000a031916815260200191505b50858103845288818151815260200191508051906020019080838360005b838110156103c95780820151818401526020810190506103ae565b50505050905090810190601f1680156103f65780820380516001836020036101000a031916815260200191505b50858103835287818151815260200191508051906020019080838360005b8381101561042f578082015181840152602081019050610414565b50505050905090810190601f16801561045c5780820380516001836020036101000a031916815260200191505b50858103825286818151815260200191508051906020019080838360005b8381101561049557808201518184015260208101905061047a565b50505050905090810190601f1680156104c25780820380516001836020036101000a031916815260200191505b509850505050505050505060405180910390f35b600060806040519081016040528086815260200185815260200184815260200183815250908060018154018082558091505090600182039060005260206000209060040201600090919290919091506000820151816000019080519060200190610541929190610841565b50602082015181600101908051906020019061055e929190610841565b50604082015181600201908051906020019061057b929190610841565b506060820151816003019080519060200190610598929190610841565b5050505050505050565b6000818154811015156105b157fe5b9060005260206000209060040201600091509050806000018054600181600116156101000203166002900480601f01602080910402602001604051908101604052809291908181526020018280546001816001161561010002031660029004801561065d5780601f106106325761010080835404028352916020019161065d565b820191906000526020600020905b81548152906001019060200180831161064057829003601f168201915b505050505090806001018054600181600116156101000203166002900480601f0160208091040260200160405190810160405280929190818152602001828054600181600116156101000203166002900480156106fb5780601f106106d0576101008083540402835291602001916106fb565b820191906000526020600020905b8154815290600101906020018083116106de57829003601f168201915b505050505090806002018054600181600116156101000203166002900480601f0160208091040260200160405190810160405280929190818152602001828054600181600116156101000203166002900480156107995780601f1061076e57610100808354040283529160200191610799565b820191906000526020600020905b81548152906001019060200180831161077c57829003601f168201915b505050505090806003018054600181600116156101000203166002900480601f0160208091040260200160405190810160405280929190818152602001828054600181600116156101000203166002900480156108375780601f1061080c57610100808354040283529160200191610837565b820191906000526020600020905b81548152906001019060200180831161081a57829003601f168201915b5050505050905084565b828054600181600116156101000203166002900490600052602060002090601f016020900481019282601f1061088257805160ff19168380011785556108b0565b828001600101855582156108b0579182015b828111156108af578251825591602001919060010190610894565b5b5090506108bd91906108c1565b5090565b6108e391905b808211156108df5760008160009055506001016108c7565b5090565b9056fea165627a7a72305820a60c487fd50963353287548e14b429de50ca94cf12505cbccd34107d00c314990029",
  "sourceMap": "25:669:2:-;;;;8:9:-1;5:2;;;30:1;27;20:12;5:2;25:669:2;;;;;;;",
  "deployedSourceMap": "25:669:2:-;;;;;;;;;;;;;;;;;;;;;;;;;;;;;261:431;;8:9:-1;5:2;;;30:1;27;20:12;5:2;261:431:2;;;;;;13:3:-1;8;5:12;2:2;;;30:1;27;20:12;2:2;261:431:2;;;;;;;;;;21:11:-1;8;5:28;2:2;;;46:1;43;36:12;2:2;261:431:2;;35:9:-1;28:4;12:14;8:25;5:40;2:2;;;58:1;55;48:12;2:2;261:431:2;;;;;;100:9:-1;95:1;81:12;77:20;67:8;63:35;60:50;39:11;25:12;22:29;11:107;8:2;;;131:1;128;121:12;8:2;261:431:2;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;30:3:-1;22:6;14;1:33;99:1;93:3;85:6;81:16;74:27;137:4;133:9;126:4;121:3;117:14;113:30;106:37;;169:3;161:6;157:16;147:26;;261:431:2;;;;;;;;;;;;;;;;;21:11:-1;8;5:28;2:2;;;46:1;43;36:12;2:2;261:431:2;;35:9:-1;28:4;12:14;8:25;5:40;2:2;;;58:1;55;48:12;2:2;261:431:2;;;;;;100:9:-1;95:1;81:12;77:20;67:8;63:35;60:50;39:11;25:12;22:29;11:107;8:2;;;131:1;128;121:12;8:2;261:431:2;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;30:3:-1;22:6;14;1:33;99:1;93:3;85:6;81:16;74:27;137:4;133:9;126:4;121:3;117:14;113:30;106:37;;169:3;161:6;157:16;147:26;;261:431:2;;;;;;;;;;;;;;;;;21:11:-1;8;5:28;2:2;;;46:1;43;36:12;2:2;261:431:2;;35:9:-1;28:4;12:14;8:25;5:40;2:2;;;58:1;55;48:12;2:2;261:431:2;;;;;;100:9:-1;95:1;81:12;77:20;67:8;63:35;60:50;39:11;25:12;22:29;11:107;8:2;;;131:1;128;121:12;8:2;261:431:2;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;30:3:-1;22:6;14;1:33;99:1;93:3;85:6;81:16;74:27;137:4;133:9;126:4;121:3;117:14;113:30;106:37;;169:3;161:6;157:16;147:26;;261:431:2;;;;;;;;;;;;;;;;;21:11:-1;8;5:28;2:2;;;46:1;43;36:12;2:2;261:431:2;;35:9:-1;28:4;12:14;8:25;5:40;2:2;;;58:1;55;48:12;2:2;261:431:2;;;;;;100:9:-1;95:1;81:12;77:20;67:8;63:35;60:50;39:11;25:12;22:29;11:107;8:2;;;131:1;128;121:12;8:2;261:431:2;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;30:3:-1;22:6;14;1:33;99:1;93:3;85:6;81:16;74:27;137:4;133:9;126:4;121:3;117:14;113:30;106:37;;169:3;161:6;157:16;147:26;;261:431:2;;;;;;;;;;;;;;;;;;219:35;;8:9:-1;5:2;;;30:1;27;20:12;5:2;219:35:2;;;;;;13:2:-1;8:3;5:11;2:2;;;29:1;26;19:12;2:2;219:35:2;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;23:1:-1;8:100;33:3;30:1;27:10;8:100;;;99:1;94:3;90:11;84:18;80:1;75:3;71:11;64:39;52:2;49:1;45:10;40:15;;8:100;;;12:14;219:35:2;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;23:1:-1;8:100;33:3;30:1;27:10;8:100;;;99:1;94:3;90:11;84:18;80:1;75:3;71:11;64:39;52:2;49:1;45:10;40:15;;8:100;;;12:14;219:35:2;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;23:1:-1;8:100;33:3;30:1;27:10;8:100;;;99:1;94:3;90:11;84:18;80:1;75:3;71:11;64:39;52:2;49:1;45:10;40:15;;8:100;;;12:14;219:35:2;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;23:1:-1;8:100;33:3;30:1;27:10;8:100;;;99:1;94:3;90:11;84:18;80:1;75:3;71:11;64:39;52:2;49:1;45:10;40:15;;8:100;;;12:14;219:35:2;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;261:431;465:13;484:200;;;;;;;;;522:10;484:200;;;;559:12;484:200;;;;605:19;484:200;;;;650:11;484:200;;;465:220;;39:1:-1;33:3;27:10;23:18;57:10;52:3;45:23;79:10;72:17;;0:93;465:220:2;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;:::i;:::-;;;;;;;;;;;;;;;;;;;;;:::i;:::-;;;;;;;;;;;;;;;;;;;;;:::i;:::-;;;;;;;;;;;;;;;;;;;;;:::i;:::-;;;;;261:431;;;;:::o;219:35::-;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;:::o;25:669::-;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;:::i;:::-;;;:::o;:::-;;;;;;;;;;;;;;;;;;;;;;;;;;;:::o",
  "source": "pragma solidity ^0.5.0;\n\ncontract PrescriptionContract {\n    struct Prescription {\n        string patientID;\n        string patientName;\n        string healthcareProvider;\n        string profession;\n        \n    }\n\n    Prescription[] public prescriptions;\n\n    function addPrescription(\n        string memory _patientID,\n        string memory _patientName,\n        string memory _healthcareProvider,\n        string memory _profession\n       \n    ) public {\n        prescriptions.push(Prescription({\n            patientID: _patientID,\n            patientName: _patientName,\n            healthcareProvider: _healthcareProvider,\n            profession: _profession\n           \n        }));\n    }\n}\n",
  "sourcePath": "/Users/twishashrivastava/healthcure/src/contracts/PrescriptionContract.sol",
  "ast": {
    "absolutePath": "/Users/twishashrivastava/healthcure/src/contracts/PrescriptionContract.sol",
    "exportedSymbols": {
      "PrescriptionContract": [
        107
      ]
    },
    "id": 108,
    "nodeType": "SourceUnit",
    "nodes": [
      {
        "id": 71,
        "literals": [
          "solidity",
          "^",
          "0.5",
          ".0"
        ],
        "nodeType": "PragmaDirective",
        "src": "0:23:2"
      },
      {
        "baseContracts": [],
        "contractDependencies": [],
        "contractKind": "contract",
        "documentation": null,
        "fullyImplemented": true,
        "id": 107,
        "linearizedBaseContracts": [
          107
        ],
        "name": "PrescriptionContract",
        "nodeType": "ContractDefinition",
        "nodes": [
          {
            "canonicalName": "PrescriptionContract.Prescription",
            "id": 80,
            "members": [
              {
                "constant": false,
                "id": 73,
                "name": "patientID",
                "nodeType": "VariableDeclaration",
                "scope": 80,
                "src": "91:16:2",
                "stateVariable": false,
                "storageLocation": "default",
                "typeDescriptions": {
                  "typeIdentifier": "t_string_storage_ptr",
                  "typeString": "string"
                },
                "typeName": {
                  "id": 72,
                  "name": "string",
                  "nodeType": "ElementaryTypeName",
                  "src": "91:6:2",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_storage_ptr",
                    "typeString": "string"
                  }
                },
                "value": null,
                "visibility": "internal"
              },
              {
                "constant": false,
                "id": 75,
                "name": "patientName",
                "nodeType": "VariableDeclaration",
                "scope": 80,
                "src": "117:18:2",
                "stateVariable": false,
                "storageLocation": "default",
                "typeDescriptions": {
                  "typeIdentifier": "t_string_storage_ptr",
                  "typeString": "string"
                },
                "typeName": {
                  "id": 74,
                  "name": "string",
                  "nodeType": "ElementaryTypeName",
                  "src": "117:6:2",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_storage_ptr",
                    "typeString": "string"
                  }
                },
                "value": null,
                "visibility": "internal"
              },
              {
                "constant": false,
                "id": 77,
                "name": "healthcareProvider",
                "nodeType": "VariableDeclaration",
                "scope": 80,
                "src": "145:25:2",
                "stateVariable": false,
                "storageLocation": "default",
                "typeDescriptions": {
                  "typeIdentifier": "t_string_storage_ptr",
                  "typeString": "string"
                },
                "typeName": {
                  "id": 76,
                  "name": "string",
                  "nodeType": "ElementaryTypeName",
                  "src": "145:6:2",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_storage_ptr",
                    "typeString": "string"
                  }
                },
                "value": null,
                "visibility": "internal"
              },
              {
                "constant": false,
                "id": 79,
                "name": "profession",
                "nodeType": "VariableDeclaration",
                "scope": 80,
                "src": "180:17:2",
                "stateVariable": false,
                "storageLocation": "default",
                "typeDescriptions": {
                  "typeIdentifier": "t_string_storage_ptr",
                  "typeString": "string"
                },
                "typeName": {
                  "id": 78,
                  "name": "string",
                  "nodeType": "ElementaryTypeName",
                  "src": "180:6:2",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_storage_ptr",
                    "typeString": "string"
                  }
                },
                "value": null,
                "visibility": "internal"
              }
            ],
            "name": "Prescription",
            "nodeType": "StructDefinition",
            "scope": 107,
            "src": "61:152:2",
            "visibility": "public"
          },
          {
            "constant": false,
            "id": 83,
            "name": "prescriptions",
            "nodeType": "VariableDeclaration",
            "scope": 107,
            "src": "219:35:2",
            "stateVariable": true,
            "storageLocation": "default",
            "typeDescriptions": {
              "typeIdentifier": "t_array$_t_struct$_Prescription_$80_storage_$dyn_storage",
              "typeString": "struct PrescriptionContract.Prescription[]"
            },
            "typeName": {
              "baseType": {
                "contractScope": null,
                "id": 81,
                "name": "Prescription",
                "nodeType": "UserDefinedTypeName",
                "referencedDeclaration": 80,
                "src": "219:12:2",
                "typeDescriptions": {
                  "typeIdentifier": "t_struct$_Prescription_$80_storage_ptr",
                  "typeString": "struct PrescriptionContract.Prescription"
                }
              },
              "id": 82,
              "length": null,
              "nodeType": "ArrayTypeName",
              "src": "219:14:2",
              "typeDescriptions": {
                "typeIdentifier": "t_array$_t_struct$_Prescription_$80_storage_$dyn_storage_ptr",
                "typeString": "struct PrescriptionContract.Prescription[]"
              }
            },
            "value": null,
            "visibility": "public"
          },
          {
            "body": {
              "id": 105,
              "nodeType": "Block",
              "src": "455:237:2",
              "statements": [
                {
                  "expression": {
                    "argumentTypes": null,
                    "arguments": [
                      {
                        "argumentTypes": null,
                        "arguments": [
                          {
                            "argumentTypes": null,
                            "id": 98,
                            "name": "_patientID",
                            "nodeType": "Identifier",
                            "overloadedDeclarations": [],
                            "referencedDeclaration": 85,
                            "src": "522:10:2",
                            "typeDescriptions": {
                              "typeIdentifier": "t_string_memory_ptr",
                              "typeString": "string memory"
                            }
                          },
                          {
                            "argumentTypes": null,
                            "id": 99,
                            "name": "_patientName",
                            "nodeType": "Identifier",
                            "overloadedDeclarations": [],
                            "referencedDeclaration": 87,
                            "src": "559:12:2",
                            "typeDescriptions": {
                              "typeIdentifier": "t_string_memory_ptr",
                              "typeString": "string memory"
                            }
                          },
                          {
                            "argumentTypes": null,
                            "id": 100,
                            "name": "_healthcareProvider",
                            "nodeType": "Identifier",
                            "overloadedDeclarations": [],
                            "referencedDeclaration": 89,
                            "src": "605:19:2",
                            "typeDescriptions": {
                              "typeIdentifier": "t_string_memory_ptr",
                              "typeString": "string memory"
                            }
                          },
                          {
                            "argumentTypes": null,
                            "id": 101,
                            "name": "_profession",
                            "nodeType": "Identifier",
                            "overloadedDeclarations": [],
                            "referencedDeclaration": 91,
                            "src": "650:11:2",
                            "typeDescriptions": {
                              "typeIdentifier": "t_string_memory_ptr",
                              "typeString": "string memory"
                            }
                          }
                        ],
                        "expression": {
                          "argumentTypes": null,
                          "id": 97,
                          "name": "Prescription",
                          "nodeType": "Identifier",
                          "overloadedDeclarations": [],
                          "referencedDeclaration": 80,
                          "src": "484:12:2",
                          "typeDescriptions": {
                            "typeIdentifier": "t_type$_t_struct$_Prescription_$80_storage_ptr_$",
                            "typeString": "type(struct PrescriptionContract.Prescription storage pointer)"
                          }
                        },
                        "id": 102,
                        "isConstant": false,
                        "isLValue": false,
                        "isPure": false,
                        "kind": "structConstructorCall",
                        "lValueRequested": false,
                        "names": [
                          "patientID",
                          "patientName",
                          "healthcareProvider",
                          "profession"
                        ],
                        "nodeType": "FunctionCall",
                        "src": "484:200:2",
                        "typeDescriptions": {
                          "typeIdentifier": "t_struct$_Prescription_$80_memory",
                          "typeString": "struct PrescriptionContract.Prescription memory"
                        }
                      }
                    ],
                    "expression": {
                      "argumentTypes": [
                        {
                          "typeIdentifier": "t_struct$_Prescription_$80_memory",
                          "typeString": "struct PrescriptionContract.Prescription memory"
                        }
                      ],
                      "expression": {
                        "argumentTypes": null,
                        "id": 94,
                        "name": "prescriptions",
                        "nodeType": "Identifier",
                        "overloadedDeclarations": [],
                        "referencedDeclaration": 83,
                        "src": "465:13:2",
                        "typeDescriptions": {
                          "typeIdentifier": "t_array$_t_struct$_Prescription_$80_storage_$dyn_storage",
                          "typeString": "struct PrescriptionContract.Prescription storage ref[] storage ref"
                        }
                      },
                      "id": 96,
                      "isConstant": false,
                      "isLValue": false,
                      "isPure": false,
                      "lValueRequested": false,
                      "memberName": "push",
                      "nodeType": "MemberAccess",
                      "referencedDeclaration": null,
                      "src": "465:18:2",
                      "typeDescriptions": {
                        "typeIdentifier": "t_function_arraypush_nonpayable$_t_struct$_Prescription_$80_storage_$returns$_t_uint256_$",
                        "typeString": "function (struct PrescriptionContract.Prescription storage ref) returns (uint256)"
                      }
                    },
                    "id": 103,
                    "isConstant": false,
                    "isLValue": false,
                    "isPure": false,
                    "kind": "functionCall",
                    "lValueRequested": false,
                    "names": [],
                    "nodeType": "FunctionCall",
                    "src": "465:220:2",
                    "typeDescriptions": {
                      "typeIdentifier": "t_uint256",
                      "typeString": "uint256"
                    }
                  },
                  "id": 104,
                  "nodeType": "ExpressionStatement",
                  "src": "465:220:2"
                }
              ]
            },
            "documentation": null,
            "id": 106,
            "implemented": true,
            "kind": "function",
            "modifiers": [],
            "name": "addPrescription",
            "nodeType": "FunctionDefinition",
            "parameters": {
              "id": 92,
              "nodeType": "ParameterList",
              "parameters": [
                {
                  "constant": false,
                  "id": 85,
                  "name": "_patientID",
                  "nodeType": "VariableDeclaration",
                  "scope": 106,
                  "src": "295:24:2",
                  "stateVariable": false,
                  "storageLocation": "memory",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_memory_ptr",
                    "typeString": "string"
                  },
                  "typeName": {
                    "id": 84,
                    "name": "string",
                    "nodeType": "ElementaryTypeName",
                    "src": "295:6:2",
                    "typeDescriptions": {
                      "typeIdentifier": "t_string_storage_ptr",
                      "typeString": "string"
                    }
                  },
                  "value": null,
                  "visibility": "internal"
                },
                {
                  "constant": false,
                  "id": 87,
                  "name": "_patientName",
                  "nodeType": "VariableDeclaration",
                  "scope": 106,
                  "src": "329:26:2",
                  "stateVariable": false,
                  "storageLocation": "memory",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_memory_ptr",
                    "typeString": "string"
                  },
                  "typeName": {
                    "id": 86,
                    "name": "string",
                    "nodeType": "ElementaryTypeName",
                    "src": "329:6:2",
                    "typeDescriptions": {
                      "typeIdentifier": "t_string_storage_ptr",
                      "typeString": "string"
                    }
                  },
                  "value": null,
                  "visibility": "internal"
                },
                {
                  "constant": false,
                  "id": 89,
                  "name": "_healthcareProvider",
                  "nodeType": "VariableDeclaration",
                  "scope": 106,
                  "src": "365:33:2",
                  "stateVariable": false,
                  "storageLocation": "memory",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_memory_ptr",
                    "typeString": "string"
                  },
                  "typeName": {
                    "id": 88,
                    "name": "string",
                    "nodeType": "ElementaryTypeName",
                    "src": "365:6:2",
                    "typeDescriptions": {
                      "typeIdentifier": "t_string_storage_ptr",
                      "typeString": "string"
                    }
                  },
                  "value": null,
                  "visibility": "internal"
                },
                {
                  "constant": false,
                  "id": 91,
                  "name": "_profession",
                  "nodeType": "VariableDeclaration",
                  "scope": 106,
                  "src": "408:25:2",
                  "stateVariable": false,
                  "storageLocation": "memory",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_memory_ptr",
                    "typeString": "string"
                  },
                  "typeName": {
                    "id": 90,
                    "name": "string",
                    "nodeType": "ElementaryTypeName",
                    "src": "408:6:2",
                    "typeDescriptions": {
                      "typeIdentifier": "t_string_storage_ptr",
                      "typeString": "string"
                    }
                  },
                  "value": null,
                  "visibility": "internal"
                }
              ],
              "src": "285:162:2"
            },
            "returnParameters": {
              "id": 93,
              "nodeType": "ParameterList",
              "parameters": [],
              "src": "455:0:2"
            },
            "scope": 107,
            "src": "261:431:2",
            "stateMutability": "nonpayable",
            "superFunction": null,
            "visibility": "public"
          }
        ],
        "scope": 108,
        "src": "25:669:2"
      }
    ],
    "src": "0:695:2"
  },
  "legacyAST": {
    "absolutePath": "/Users/twishashrivastava/healthcure/src/contracts/PrescriptionContract.sol",
    "exportedSymbols": {
      "PrescriptionContract": [
        107
      ]
    },
    "id": 108,
    "nodeType": "SourceUnit",
    "nodes": [
      {
        "id": 71,
        "literals": [
          "solidity",
          "^",
          "0.5",
          ".0"
        ],
        "nodeType": "PragmaDirective",
        "src": "0:23:2"
      },
      {
        "baseContracts": [],
        "contractDependencies": [],
        "contractKind": "contract",
        "documentation": null,
        "fullyImplemented": true,
        "id": 107,
        "linearizedBaseContracts": [
          107
        ],
        "name": "PrescriptionContract",
        "nodeType": "ContractDefinition",
        "nodes": [
          {
            "canonicalName": "PrescriptionContract.Prescription",
            "id": 80,
            "members": [
              {
                "constant": false,
                "id": 73,
                "name": "patientID",
                "nodeType": "VariableDeclaration",
                "scope": 80,
                "src": "91:16:2",
                "stateVariable": false,
                "storageLocation": "default",
                "typeDescriptions": {
                  "typeIdentifier": "t_string_storage_ptr",
                  "typeString": "string"
                },
                "typeName": {
                  "id": 72,
                  "name": "string",
                  "nodeType": "ElementaryTypeName",
                  "src": "91:6:2",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_storage_ptr",
                    "typeString": "string"
                  }
                },
                "value": null,
                "visibility": "internal"
              },
              {
                "constant": false,
                "id": 75,
                "name": "patientName",
                "nodeType": "VariableDeclaration",
                "scope": 80,
                "src": "117:18:2",
                "stateVariable": false,
                "storageLocation": "default",
                "typeDescriptions": {
                  "typeIdentifier": "t_string_storage_ptr",
                  "typeString": "string"
                },
                "typeName": {
                  "id": 74,
                  "name": "string",
                  "nodeType": "ElementaryTypeName",
                  "src": "117:6:2",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_storage_ptr",
                    "typeString": "string"
                  }
                },
                "value": null,
                "visibility": "internal"
              },
              {
                "constant": false,
                "id": 77,
                "name": "healthcareProvider",
                "nodeType": "VariableDeclaration",
                "scope": 80,
                "src": "145:25:2",
                "stateVariable": false,
                "storageLocation": "default",
                "typeDescriptions": {
                  "typeIdentifier": "t_string_storage_ptr",
                  "typeString": "string"
                },
                "typeName": {
                  "id": 76,
                  "name": "string",
                  "nodeType": "ElementaryTypeName",
                  "src": "145:6:2",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_storage_ptr",
                    "typeString": "string"
                  }
                },
                "value": null,
                "visibility": "internal"
              },
              {
                "constant": false,
                "id": 79,
                "name": "profession",
                "nodeType": "VariableDeclaration",
                "scope": 80,
                "src": "180:17:2",
                "stateVariable": false,
                "storageLocation": "default",
                "typeDescriptions": {
                  "typeIdentifier": "t_string_storage_ptr",
                  "typeString": "string"
                },
                "typeName": {
                  "id": 78,
                  "name": "string",
                  "nodeType": "ElementaryTypeName",
                  "src": "180:6:2",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_storage_ptr",
                    "typeString": "string"
                  }
                },
                "value": null,
                "visibility": "internal"
              }
            ],
            "name": "Prescription",
            "nodeType": "StructDefinition",
            "scope": 107,
            "src": "61:152:2",
            "visibility": "public"
          },
          {
            "constant": false,
            "id": 83,
            "name": "prescriptions",
            "nodeType": "VariableDeclaration",
            "scope": 107,
            "src": "219:35:2",
            "stateVariable": true,
            "storageLocation": "default",
            "typeDescriptions": {
              "typeIdentifier": "t_array$_t_struct$_Prescription_$80_storage_$dyn_storage",
              "typeString": "struct PrescriptionContract.Prescription[]"
            },
            "typeName": {
              "baseType": {
                "contractScope": null,
                "id": 81,
                "name": "Prescription",
                "nodeType": "UserDefinedTypeName",
                "referencedDeclaration": 80,
                "src": "219:12:2",
                "typeDescriptions": {
                  "typeIdentifier": "t_struct$_Prescription_$80_storage_ptr",
                  "typeString": "struct PrescriptionContract.Prescription"
                }
              },
              "id": 82,
              "length": null,
              "nodeType": "ArrayTypeName",
              "src": "219:14:2",
              "typeDescriptions": {
                "typeIdentifier": "t_array$_t_struct$_Prescription_$80_storage_$dyn_storage_ptr",
                "typeString": "struct PrescriptionContract.Prescription[]"
              }
            },
            "value": null,
            "visibility": "public"
          },
          {
            "body": {
              "id": 105,
              "nodeType": "Block",
              "src": "455:237:2",
              "statements": [
                {
                  "expression": {
                    "argumentTypes": null,
                    "arguments": [
                      {
                        "argumentTypes": null,
                        "arguments": [
                          {
                            "argumentTypes": null,
                            "id": 98,
                            "name": "_patientID",
                            "nodeType": "Identifier",
                            "overloadedDeclarations": [],
                            "referencedDeclaration": 85,
                            "src": "522:10:2",
                            "typeDescriptions": {
                              "typeIdentifier": "t_string_memory_ptr",
                              "typeString": "string memory"
                            }
                          },
                          {
                            "argumentTypes": null,
                            "id": 99,
                            "name": "_patientName",
                            "nodeType": "Identifier",
                            "overloadedDeclarations": [],
                            "referencedDeclaration": 87,
                            "src": "559:12:2",
                            "typeDescriptions": {
                              "typeIdentifier": "t_string_memory_ptr",
                              "typeString": "string memory"
                            }
                          },
                          {
                            "argumentTypes": null,
                            "id": 100,
                            "name": "_healthcareProvider",
                            "nodeType": "Identifier",
                            "overloadedDeclarations": [],
                            "referencedDeclaration": 89,
                            "src": "605:19:2",
                            "typeDescriptions": {
                              "typeIdentifier": "t_string_memory_ptr",
                              "typeString": "string memory"
                            }
                          },
                          {
                            "argumentTypes": null,
                            "id": 101,
                            "name": "_profession",
                            "nodeType": "Identifier",
                            "overloadedDeclarations": [],
                            "referencedDeclaration": 91,
                            "src": "650:11:2",
                            "typeDescriptions": {
                              "typeIdentifier": "t_string_memory_ptr",
                              "typeString": "string memory"
                            }
                          }
                        ],
                        "expression": {
                          "argumentTypes": null,
                          "id": 97,
                          "name": "Prescription",
                          "nodeType": "Identifier",
                          "overloadedDeclarations": [],
                          "referencedDeclaration": 80,
                          "src": "484:12:2",
                          "typeDescriptions": {
                            "typeIdentifier": "t_type$_t_struct$_Prescription_$80_storage_ptr_$",
                            "typeString": "type(struct PrescriptionContract.Prescription storage pointer)"
                          }
                        },
                        "id": 102,
                        "isConstant": false,
                        "isLValue": false,
                        "isPure": false,
                        "kind": "structConstructorCall",
                        "lValueRequested": false,
                        "names": [
                          "patientID",
                          "patientName",
                          "healthcareProvider",
                          "profession"
                        ],
                        "nodeType": "FunctionCall",
                        "src": "484:200:2",
                        "typeDescriptions": {
                          "typeIdentifier": "t_struct$_Prescription_$80_memory",
                          "typeString": "struct PrescriptionContract.Prescription memory"
                        }
                      }
                    ],
                    "expression": {
                      "argumentTypes": [
                        {
                          "typeIdentifier": "t_struct$_Prescription_$80_memory",
                          "typeString": "struct PrescriptionContract.Prescription memory"
                        }
                      ],
                      "expression": {
                        "argumentTypes": null,
                        "id": 94,
                        "name": "prescriptions",
                        "nodeType": "Identifier",
                        "overloadedDeclarations": [],
                        "referencedDeclaration": 83,
                        "src": "465:13:2",
                        "typeDescriptions": {
                          "typeIdentifier": "t_array$_t_struct$_Prescription_$80_storage_$dyn_storage",
                          "typeString": "struct PrescriptionContract.Prescription storage ref[] storage ref"
                        }
                      },
                      "id": 96,
                      "isConstant": false,
                      "isLValue": false,
                      "isPure": false,
                      "lValueRequested": false,
                      "memberName": "push",
                      "nodeType": "MemberAccess",
                      "referencedDeclaration": null,
                      "src": "465:18:2",
                      "typeDescriptions": {
                        "typeIdentifier": "t_function_arraypush_nonpayable$_t_struct$_Prescription_$80_storage_$returns$_t_uint256_$",
                        "typeString": "function (struct PrescriptionContract.Prescription storage ref) returns (uint256)"
                      }
                    },
                    "id": 103,
                    "isConstant": false,
                    "isLValue": false,
                    "isPure": false,
                    "kind": "functionCall",
                    "lValueRequested": false,
                    "names": [],
                    "nodeType": "FunctionCall",
                    "src": "465:220:2",
                    "typeDescriptions": {
                      "typeIdentifier": "t_uint256",
                      "typeString": "uint256"
                    }
                  },
                  "id": 104,
                  "nodeType": "ExpressionStatement",
                  "src": "465:220:2"
                }
              ]
            },
            "documentation": null,
            "id": 106,
            "implemented": true,
            "kind": "function",
            "modifiers": [],
            "name": "addPrescription",
            "nodeType": "FunctionDefinition",
            "parameters": {
              "id": 92,
              "nodeType": "ParameterList",
              "parameters": [
                {
                  "constant": false,
                  "id": 85,
                  "name": "_patientID",
                  "nodeType": "VariableDeclaration",
                  "scope": 106,
                  "src": "295:24:2",
                  "stateVariable": false,
                  "storageLocation": "memory",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_memory_ptr",
                    "typeString": "string"
                  },
                  "typeName": {
                    "id": 84,
                    "name": "string",
                    "nodeType": "ElementaryTypeName",
                    "src": "295:6:2",
                    "typeDescriptions": {
                      "typeIdentifier": "t_string_storage_ptr",
                      "typeString": "string"
                    }
                  },
                  "value": null,
                  "visibility": "internal"
                },
                {
                  "constant": false,
                  "id": 87,
                  "name": "_patientName",
                  "nodeType": "VariableDeclaration",
                  "scope": 106,
                  "src": "329:26:2",
                  "stateVariable": false,
                  "storageLocation": "memory",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_memory_ptr",
                    "typeString": "string"
                  },
                  "typeName": {
                    "id": 86,
                    "name": "string",
                    "nodeType": "ElementaryTypeName",
                    "src": "329:6:2",
                    "typeDescriptions": {
                      "typeIdentifier": "t_string_storage_ptr",
                      "typeString": "string"
                    }
                  },
                  "value": null,
                  "visibility": "internal"
                },
                {
                  "constant": false,
                  "id": 89,
                  "name": "_healthcareProvider",
                  "nodeType": "VariableDeclaration",
                  "scope": 106,
                  "src": "365:33:2",
                  "stateVariable": false,
                  "storageLocation": "memory",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_memory_ptr",
                    "typeString": "string"
                  },
                  "typeName": {
                    "id": 88,
                    "name": "string",
                    "nodeType": "ElementaryTypeName",
                    "src": "365:6:2",
                    "typeDescriptions": {
                      "typeIdentifier": "t_string_storage_ptr",
                      "typeString": "string"
                    }
                  },
                  "value": null,
                  "visibility": "internal"
                },
                {
                  "constant": false,
                  "id": 91,
                  "name": "_profession",
                  "nodeType": "VariableDeclaration",
                  "scope": 106,
                  "src": "408:25:2",
                  "stateVariable": false,
                  "storageLocation": "memory",
                  "typeDescriptions": {
                    "typeIdentifier": "t_string_memory_ptr",
                    "typeString": "string"
                  },
                  "typeName": {
                    "id": 90,
                    "name": "string",
                    "nodeType": "ElementaryTypeName",
                    "src": "408:6:2",
                    "typeDescriptions": {
                      "typeIdentifier": "t_string_storage_ptr",
                      "typeString": "string"
                    }
                  },
                  "value": null,
                  "visibility": "internal"
                }
              ],
              "src": "285:162:2"
            },
            "returnParameters": {
              "id": 93,
              "nodeType": "ParameterList",
              "parameters": [],
              "src": "455:0:2"
            },
            "scope": 107,
            "src": "261:431:2",
            "stateMutability": "nonpayable",
            "superFunction": null,
            "visibility": "public"
          }
        ],
        "scope": 108,
        "src": "25:669:2"
      }
    ],
    "src": "0:695:2"
  },
  "compiler": {
    "name": "solc",
    "version": "0.5.0+commit.1d4f565a.Emscripten.clang"
  },
  "networks": {
    "5777": {
      "events": {},
      "links": {},
      "address": "0x8961D705145faF0902183D396f543E5Db98F76dB",
      "transactionHash": "0x766e3c81afefbdf0eee7d9a9ea8763b659461f4cae41afb34be6d5eeb787a134"
    }
  },
  "schemaVersion": "3.0.2",
  "updatedAt": "2024-05-09T06:48:28.640Z",
  "devdoc": {
    "methods": {}
  },
  "userdoc": {
    "methods": {}
  }
}]

    // Contract address - Replace with your actual contract address
    const contractAddress = '0x8961D705145faF0902183D396f543E5Db98F76dB';

    const prescriptionForm = document.getElementById('prescriptionForm');

    prescriptionForm.addEventListener('submit', async function(event) {
        event.preventDefault();

        const formData = new FormData(prescriptionForm);
        const prescriptionData = {
            patientID: formData.get('patientID'),
            patientName: formData.get('patientName'),
            healthcareProvider: formData.get('healthcareProvider'),
            profession: formData.get('profession')
            
        };
                                      
        const contract = new web3.eth.Contract(contractABI, contractAddress);

        try {
            // Sending transaction to the smart contract
            const accounts = await web3.eth.getAccounts();
            await contract.methods.addPrescription(
                prescriptionData.patientID,
                prescriptionData.patientName,
                prescriptionData.healthcareProvider,
                prescriptionData.profession
            ).send({ from: accounts[0] });
            // Transaction successful, provide feedback to the user
            alert('Prescription added successfully!');
            // You can redirect the user to another page or perform other actions here
        } catch (error) {
            console.error('Error adding prescription:', error);
            // Provide error feedback to the user
            alert('Error adding prescription. Please try again.');
        }
    });
});

