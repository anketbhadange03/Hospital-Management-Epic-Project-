web3.eth.getBalance('0xYourEthAddress').then(console.log);
const transactionObject = {
  from: '0xYourEthAddress',
  to: '0xRecipientEthAddress',
  value: web3.utils.toWei('1', 'ether') // Sending 1 Ether
};

web3.eth.sendTransaction(transactionObject)
  .on('transactionHash', console.log)
  .on('receipt', console.log)
  .on('error', console.error);

