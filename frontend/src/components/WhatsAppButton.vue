<template>
  <a href="https://wa.me/+79190234000?text=Здравствуйте!" class="whatsapp-float" target="_blank" title="Написать в WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</template>

<style scoped>
.whatsapp-float {
  position: fixed;         
  width: 60px;              
  height: 60px;             
  bottom: 30px;              
  right: 30px;               
  background-color: #25d366; 
  color: #FFF;
  border-radius: 50px;      
  text-align: center;
  font-size: 35px;          
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); 
  z-index: 9999;            
  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  transition: all 0.3s ease;
  animation: pulse-wa 2s infinite; 
}

.whatsapp-float:hover {
  background-color: #128C7E;
  color: white;
  transform: scale(1.1);     
  animation: none;           
  box-shadow: 0 6px 15px rgba(37, 211, 102, 0.5);
}

@keyframes pulse-wa {
  0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
  70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
  100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
}

@media (max-width: 768px) {
  .whatsapp-float {
    width: 50px;
    height: 50px;
    bottom: 20px;
    right: 20px;
    font-size: 30px;
  }
}
</style>
