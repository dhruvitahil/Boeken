<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	

.shiptext
{
  width: 75%;
  padding: 15px;
  margin: 0px;
 border: 1px solid #ddd;
  background: white;
  text-align: center;
}

.shiptext:focus{
  background-color: #f1f1f1;
  outline: none;
  border: 1px solid black;
} 


.input-icons i { 
            position: absolute; 
        }           
.icon { 
            padding: 10px; 
            color: black; 
            min-width: 50px; 
            text-align: center; 
        } 
.input-icons{ 
            margin: 20px 0px;
}


.shipform {
	width: 70%;
    margin: 0px;
    padding: 20px;
    background: #ffffff;
}
 
div.form-element {
    margin: 20px 0;
}
.custom-select {
  position: relative;
  font-family: Arial;
}
.shipbutton {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  width:100% ;
  font-size: 18px;
  display: inline-block;
}
.shipbutton:hover {
  opacity: 0.7;
}
.state{
	width: 300px;
	height: 40px;
}
	</style>
	      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
}
</head>
<body>
	<form method="POST" class="shipform">
 <fieldset>
  <legend>Shipping Address</legend>
  <div class="input-icons"> 
        <i class="far fa-user icon"> 
        </i> 
        <input type="text" class="shiptext" name="firstname" placeholder="Enter First name" pattern="[a-zA-Z0-9]+" required />
    </div>
      <div class="input-icons"> 
        <i class="far fa-user icon"> 
        </i> 
        <input type="text" class="shiptext" name="lastname" placeholder="Enter Last name" pattern="[a-zA-Z0-9]+" required />
    </div>
      <div class="input-icons"> 
        <i class="fas fa-road icon"></i>
        <input type="text" class="shiptext" name="streetname" placeholder="Enter Street name" pattern="[a-zA-Z0-9]+" required />
    </div>
      <div class="input-icons"> 
        <i class="far fa-building icon"></i> 
        <input type="text" name="aptno" class="shiptext" placeholder="Enter Apartment number" pattern="[a-zA-Z0-9]+" required />
    </div><br>
    
    <select class="countries custom-select" style="width: 300px; height: 40px; float: left;">          
	</select>
<div class="option custom-select" style="margin-left: 350px;">
  <select class="AndamanAndNicobarIslands state">

  </select>
  <select class="AndhraPradesh state">

  </select>
  <select class="ArunachalPradesh state">

  </select>
  <select class="Bihar state">

  </select>
  <select class="ChandigarhUnionTerritory state">

  </select>
  <select class="Chhattisgarh state">

  </select>
  <select class="Delhi state">

  </select>
  <select class="Gujarat state">

  </select>
  <select class="Goa state">

  </select>
  <select class="Chandigarh state">

  </select>
  <select class="HimachalPradesh state">

  </select>
  <select class="JammuAndKashmir state">

  </select>
  <select class="Jharkhand state">

  </select>
  <select class="Karnataka state">

  </select>
  <select class="Kerala state">

  </select>
  <select class="MadhyaPradesh state">

  </select>
  <select class="Maharashtra state">

  </select>
  <select class="Manipur state">

  </select>
  <select class="Meghalaya state">

  </select>
  <select class="Mizoram state">

  </select>
  <select class="Nagaland state">

  </select>
  <select class="Odisha state">

  </select>
  <select class="Puducherry state">

  </select>
  <select class="Punjab state">

  </select>
  <select class="Rajasthan state">

  </select>
  <select class="Sikkim state">

  </select>
  <select class="TamilNadu state">

  </select>
  <select class="Telanga state">

  </select>
  <select class="UttarPradesh state">

  </select>
  <select class="Uttarakhand state">

  </select>
  <select class="WestBengal state">

  </select>
</div><br><br>
Cash on delivery: <input type="checkbox" id="myCheck" name="test"><br><br>
<button type="submit" class="shipbutton"><a href="checkout.php" style="text-decoration: none; color: white;">Checkout</a> </button>
 </fieldset>
</form>
<script type="text/javascript">
	$(function () {
   
    'use strict';
    
    var CountSelect = $('.countries'),
    
    
        myCountries1 = ['Andaman And Nicobar Islands','Andhra Pradesh','Bihar','Chandigarh Union Territory','Chhattisgarh','Chandigarh', 'Arunachal Pradesh',' Delhi','Gujarat','Goa','Chandigarh','Himachal Pradesh','Jammu And Kashmir','Jharkhand','Karnataka','Kerala','Madhya Pradesh','Maharashtra','Manipur','Meghalaya','Mizoram','Nagaland','Odisha','Puducherry Union Territory','Punjab','Rajasthan','Sikkim','Tamil Nadu','Telanga','Uttar Pradesh','Uttarakhand','West Bengal'],
        
      myCountries=['AndamanAndNicobarIslands','AndhraPradesh','Bihar','ChandigarhUnionTerritory','Chhattisgarh','Chandigarh','ArunachalPradesh','Delhi','Gujarat','Goa','Chandigarh','HimachalPradesh','JammuAndKashmir','Jharkhand','Karnataka','Kerala','MadhyaPradesh','Maharashtra','Manipur','Meghalaya','Mizoram','Nagaland','Odisha','PuducherryUnionTerritory','Punjab','Rajasthan','Sikkim','TamilNadu','Telanga','UttarPradesh','Uttarakhand','WestBengal'],


        AndamanAndNicobarIslands = ['Port Blair'],
        
        AndhraPradesh=['Adoni','Amaravati','Anantapur','Chandragiri','Chittoor','Dowlaiswaram','Eluru','Guntur','Kadapa','Kakinada','Kurnool','Machilipatnam','Nagarjunakoṇḍa','Rajahmundry','Srikakulam','Tirupati','Vijayawada','Visakhapatnam','Vizianagaram','Yemmiganur'],
        ArunachalPradesh=['Itanagar','Assam','Dhuburi','Dibrugarh','Dispur','Guwahati','Jorhat','Nagaon','Sibsagar','Silchar','Tezpur','Tinsukia'],
        
        Bihar = ['Ara','Baruni','Begusarai','Bettiah','Bhagalpur','Bihar Sharif','Bodh Gaya','Buxar','Chapra','Darbhanga','Dehri','Dinapur Nizamat','Gaya','Hajipur','Jamalpur','Katihar','Madhubani','Motihari','Munger','Muzaffarpur','Patna','Purnia','Pusa','Saharsa','Samastipur','Sasaram','Sitamarhi','Siwan'],
        ChandigarhUnionTerritory= ['Chandigarh'],
		Chhattisgarh=['Ambikapur','Bhilai','Bilaspur','Dhamtari','Durg','Jagdalpur','Raipur','Rajnandgaon'],        
		Chandigarh=['Faridabad','Firozpur','Jhirka','Gurgaon','Hansi','Hisar','Jind','Kaithal','Karnal','Kurukshetra','Panipat','Pehowa','Rewari','Rohtak','Sirsa','Sonipat',],
		Delhi=['New Delhi'],
		Gujarat=['Ahmadabad','Amreli','Bharuch','Bhavnagar','Bhuj','Dwarka','Gandhinagar','Godhra','Jamnagar','Junagadh','Kandla','Khambhat','Kheda','Mahesana','Morvi','Nadiad','Navsari','Okha','Palanpur','Patan','Porbandar','Rajkot','Surat','Surendranagar','Valsad','Veraval'],
		Goa=['Madgaon','Panaji','Haryana','Ambala','Bhiwani'],
		HimachalPradesh=['Bilaspur','Chamba','Dalhousie','Dharmshala','Hamirpur','Kangra','Kullu','Mandi','Nahan','Shimla','Una'],
		JammuAndKashmir=['Anantnag','Baramula','Doda','Gulmarg','Jammu','Kathua','Leh','Punch','Rajauri','Srinagar','Udhampur'],
		Jharkhand=['Bokaro','Chaibasa','Deoghar','Dhanbad','Dumka','Giridih','Hazaribag','Jamshedpur','Jharia','Rajmahal','Ranchi','Saraikela'],
		Karnataka=['Badami','Ballari','Bangalore','Belgavi','Bhadravati','Bidar','Chikkamagaluru','Chitradurga','Davangere','Halebid','Hassan','Hubballi-Dharwad','Kalaburagi','Kolar','Madikeri','Mandya','Mangaluru','Mysuru','Raichur','Shivamogga','Shravanabelagola','Shrirangapattana','Tumkuru'],
		Kerala=['Alappuzha','Badagara','Idukki','Kannur','Kochi','Kollam','Kottayam','Kozhikode','Mattancheri','Palakkad','Thalassery','Thiruvananthapuram','Thrissur'],
		MadhyaPradesh=['Balaghat','Barwani','Betul','Bharhut','Bhind','Bhojpur','Bhopal','Burhanpur','Chhatarpur','Chhindwara','Damoh','Datia','Dewas','Dhar','Guna','Gwalior','Hoshangabad','Indore','Itarsi','Jabalpur','Jhabua','Khajuraho','Khandwa','Khargon','Maheshwar','Mandla','Mandsaur','Mhow','Morena','Murwara','Narsimhapur','Narsinghgarh','Narwar','Neemuch','Nowgong','Orchha','Panna','Raisen','Rajgarh','Ratlam','Rewa','Sagar','Sarangpur','Satna','Sehore','Seoni','Shahdol','Shajapur','Sheopur','Shivpuri','Ujjain','Vidisha'],
		Maharashtra=['Ahmadnagar','Akola','Amravati','Aurangabad','Bhandara','Bhusawal','Bid','Buldana','Chandrapur','Daulatabad','Dhule','Jalgaon','Kalyan','Karli','Kolhapur','Mahabaleshwar','Malegaon','Matheran','Mumbai','Nagpur','Nanded','Nashik','Osmanabad','Pandharpur','Parbhani','Pune','Ratnagiri','Sangli','Satara','Sevagram','Solapur','Thane','Ulhasnagar','Vasai-Virar','Wardha','Yavatmal'], 
		Manipur=['Imphal'],
		Meghalaya=['Cherrapunji','Shillong'],
		Mizoram=['Aizawl','Lunglei'],
		Nagaland=['Kohima','Mon','Phek','Wokha','Zunheboto'],
		Odisha=['Balangir','Baleshwar','Baripada','Bhubaneshwar','Brahmapur','Cuttack','Dhenkanal','Keonjhar','Konark','Koraput','Paradip','Phulabani','Puri','Sambalpur','Udayagiri'],
		PuducherryUnionTerritory=['Karaikal','Mahe','Puducherry','Yanam'],

		Punjab=['Amritsar','Batala','Chandigarh','Faridkot','Firozpur','Gurdaspur','Hoshiarpur','Jalandhar','Kapurthala','Ludhiana','Nabha','Patiala','Rupnagr','Sangrur'],
		Rajasthan=['Abu','Ajmer','Alwar','Amer','Barmer','Beawar','Bharatpur','Bhilwara','Bikaner','Bundi','Chittaurgarh','Churu','Dhaulpur','Dungarpur','Ganganagar','Hanumangarh','Jaipur','Jaisalmer','Jalor','Jhalawar','Jhunjhunu','Jodhpur','Kishangarh','Kota','Merta','Nagaur','Nathdwara','Pali','Phalodi','Pushkar','Sawai','Madhopur','Shahpura','Sikar','Sirohi','Tonk','Udaipur'],
		Sikkim= ['Gangtok','Gyalsing','Lachung','Mangan'],
		TamilNadu =['Arcot','Chengalpattu','Chennai','Chidambaram','Coimbatore','Cuddalore','Dharmapuri','Dindigul','Erode','Kanchipuram','Kanniyakumari','Kodaikanal','Kumbakonam','Madurai','Mamallapuram','Nagappattinam','Nagercoil','Palayankottai','Pudukkottai','Rajapalaiyam','Ramanathapuram','Salem','Thanjavur','Tiruchchirappalli','Tirunelveli','Tiruppur','Tuticorin','Udhagamandalam','Vellore'],
		Telangana=['Hyderabad','Karimnagar','Khammam','Mahbubnagar','Nizamabad','Sangareddi','Warangal','Tripura','Agartala'],
		UttarPradesh=['Agra','Aligarh','Amroha','Ayodhya','Azamgarh','Bahraich','Ballia','Banda','Bara','Banki','Bareilly','Basti','Bijnor','Bithur','Budaun','Bulandshahr','Deoria','Etah','Etawah','Faizabad','Farrukhabad-cum-Fatehgarh','Fatehpur','Fatehpur','Sikri','Ghaziabad','Ghazipur','Gonda','Gorakhpur','Hamirpur','Hardoi','Hathras','Jalaun','Jaunpur','Jhansi','Kannauj','Kanpur','Lakhimpur','Lalitpur','Lucknow','Mainpuri','Mathura','Meerut','Mirzapur-Vindhyachal','Moradabad','Muzaffarnagar','Partapgarh','Pilibhit','Prayagraj','Rae','Bareli','Rampur','Saharanpur','Sambhal','Shahjahanpur','Sitapur','Sultanpur','Tehri','Varanasi'],
		Uttarakhand=['Almora','Dehra','Dun','Haridwar','Mussoorie','Nainital','Pithoragarh'],
		WestBengal=['Alipore','Alipur','Duar','Asansol','Baharampur','Bally','Balurghat','Bankura','Baranagar','Barasat','Barrackpore','Basirhat','Bhatpara','Bishnupur','Budge','Budge','Burdwan','Chandernagore','Darjiling','Diamond','Harbour','Dum','Dum','Durgapur','Halisahar','Haora','Hugli','Ingraj','Bazar','Jalpaiguri','Kalimpong','Kamarhati','Kanchrapara','Kharagpur','Koch','Bihar','Kolkata','Krishnanagar','Malda','Midnapore','Murshidabad','Navadwip','Palashi','Panihati','Purulia','Raiganj','Santipur','Shantiniketan','Shrirampur','Siliguri','Siuri','Tamluk','Titagarh'];
        
    // Function Create Option    
    
    function CreateOption(valriable1,valriable, elementToAppend) {
        
        var i;
        
        for (i = 0; i < valriable.length; i += 1) {
    
            $('<option>', {value: valriable[i], text: valriable1[i], id: valriable[i]})
                .appendTo(elementToAppend);
        }
    }
    
    
    // Create Option myCountries
    CreateOption(myCountries1,myCountries, $('.countries'));
    
    // Create Option Africa
    CreateOption(AndamanAndNicobarIslands,AndamanAndNicobarIslands, $('.AndamanAndNicobarIslands'));
    CreateOption(ArunachalPradesh,ArunachalPradesh, $('.ArunachalPradesh'));
    CreateOption(AndhraPradesh, AndhraPradesh, $('.AndhraPradesh'));
    CreateOption(Bihar,Bihar, $('.Bihar'));
    CreateOption(ChandigarhUnionTerritory,ChandigarhUnionTerritory, $('.ChandigarhUnionTerritory'));
    CreateOption(Chhattisgarh,Chhattisgarh, $('.Chhattisgarh'));
    CreateOption(Chandigarh,Chandigarh, $('.Chandigarh'));
    CreateOption(Delhi,Delhi, $('.Delhi'));
    CreateOption(Goa,Goa, $('.Goa'));
    CreateOption(Gujarat,Gujarat, $('.Gujarat'));
    CreateOption(HimachalPradesh,HimachalPradesh, $('.HimachalPradesh'));
    CreateOption(JammuAndKashmir,JammuAndKashmir, $('.JammuAndKashmir'));
    CreateOption(Jharkhand,Jharkhand, $('.Jharkhand'));
    CreateOption(Karnataka,Karnataka, $('.Karnataka'));
    CreateOption(Kerala,Kerala, $('.Kerala'));
    CreateOption(MadhyaPradesh,MadhyaPradesh, $('.MadhyaPradesh'));
    CreateOption(Maharashtra,Maharashtra, $('.Maharashtra'));
    CreateOption(Manipur,Manipur, $('.Manipur'));
    CreateOption(Meghalaya,Meghalaya, $('.Meghalaya'));
    CreateOption(Mizoram,Mizoram, $('.Mizoram'));
    CreateOption(Nagaland,Nagaland, $('.Nagaland'));
    CreateOption(Odisha,Odisha, $('.Odisha'));
    CreateOption(PuducherryUnionTerritory,PuducherryUnionTerritory, $('.PuducherryUnionTerritory'));
    CreateOption(Punjab,Punjab, $('.Punjab'));
    CreateOption(Rajasthan,Rajasthan, $('.Rajasthan'));
    CreateOption(Sikkim,Sikkim, $('.Sikkim'));
    CreateOption(TamilNadu,TamilNadu, $('.TamilNadu'));
    CreateOption(Telangana,Telangana, $('.Telangana'));
    CreateOption(UttarPradesh,UttarPradesh, $('.Uttarakhand'));
    CreateOption(Uttarakhand,Uttarakhand, $('.Uttarakhand'));
    CreateOption(WestBengal,WestBengal, $('.WestBengal'));


    // Hide All Select
    $('.option select').hide();
    
    // Show First Selected
    $('.AndamanAndNicobarIslands').show().css('display', 'inline-block');
    
    
    
    // Show List Option City Whene user Chosse Countries
    
    CountSelect.on('change', function () {
        
        // get Id option 
        var myId = $(this).find(':selected').attr('id');
        console.log($(this).val());
        // Show Select Has class = Id And Hide Siblings
        $('.option select').filter('.' + myId).fadeIn(400).siblings('select').hide();
        
    });
    
});
</script>
</body>
</html>