import React,{useEffect, useState} from 'react';

const Register = (searchParams) => {
  const [plan, setPlan] = useState([
    {'price':29, 'features': ['Individual configuration','No setup, or hidden fees','Team size: 1 developer','Premium support: 6 months','Free updates: 6 months']},
    {'price':49, 'features': ['Individual configuration','No setup, or hidden fees','Team size: 10 developer','Premium support: 24 months','Free updates: 24 months']},
    {'price':99, 'features': ['Individual configuration','No setup, or hidden fees','Team size: 100 developer','Premium support: 36 months','Free updates: 36 months']},
  ]);

  const [selectedPlan, setSelectedPlan] = useState(plan[0]);

  useEffect(() => {

    if(searchParams.plan && searchParams.plan > 0 && searchParams.plan < 4){
      setSelectedPlan(plan[parseInt(searchParams.plan) -1]);
    }

  }, [searchParams.plan, plan]);



  return (
    <div className="min-h-screen flex justify-center items-center">
      <div className="max-w-5xl w-full mx-auto flex flex-col md:flex-row lg:flex-row">
        <div className="flex-1 md:mr-5 lg:mr-5">
          <div className="bg-gray-100 px-6 py-8 rounded-md mb-12">
            <h2 className="text-5xl font-extrabold text-[#333]">${selectedPlan.price}</h2>
            <ul className="text-[#333] my-10 space-y-6">
              

              {
                selectedPlan.features.map((feature,index) => {
                  return (
                    <li key={index} className='flex items-center space-x-3'>
                      <svg className="h-6 w-6 flex-none fill-sky-100 stroke-green-500 stroke-2" strokeLinecap="round" strokeLinejoin="round">
                        <circle cx="12" cy="12" r="11" />
                        <path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
                      </svg>
                      <span>{feature}</span>
                    </li>
                  )
                })
              }

            </ul>
            <a href='/pricing' className="bg-green-500 hover:bg-green-700 text-white rounded-lg px-3 py-3 font-semibold"><i className="mdi mdi-lock-outline mr-1"></i> Change Plan</a>
          </div>
        </div>

        {/* payemt gateway */}
        <div className="flex-1 md:ml-5 lg:ml-5">
          <div className="bg-white text-gray-800 shadow-lg rounded-lg p-5">
            <div className="flex justify-center">
              <div className="bg-green-500 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 flex justify-center items-center">
                <i className="mdi mdi-credit-card-outline text-3xl"></i>
              </div>
            </div>
            <div className="mb-10">
              <h1 className="text-center font-bold text-xl uppercase">Secure payment info</h1>
            </div>
            <div className="mb-3">
              <label className="font-bold text-sm mb-2 ml-1">Email</label>
              <div>
                <input className="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-green-500 transition-colors" placeholder="example@example.com" type="email" />
              </div>
            </div>

            <div className="mb-3">
              <label className="font-bold text-sm mb-2 ml-1">Password</label>
              <div>
                <input className="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-green-500 transition-colors" placeholder="********" type="password" />
              </div>
            </div>

            {/* paymentCards Images */}
            <div className="mb-3">
              <img height={120} width={250} src={"/assets/images/paymentCards.png"} className="h-8 ml-3" alt='paymentCards' />
            </div>

            <div className="mb-3">
              <label className="font-bold text-sm mb-2 ml-1">Name on card</label>
              <div>
                <input className="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-green-500 transition-colors" placeholder="John Smith" type="text" />
              </div>
            </div>
            <div className="mb-3">
              <label className="font-bold text-sm mb-2 ml-1">Card number</label>
              <div>
                <input className="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-green-500 transition-colors" placeholder="0000 0000 0000 0000" type="text" />
              </div>
            </div>
            <div className="mb-3 flex justify-between items-center"> {/* Added flex container here */}
              <div>
                <label className="font-bold text-sm mb-2 ml-1">Expiration date</label>
                <div>
                  <select className="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-green-500 transition-colors cursor-pointer">
                    <option value="01">01 - January</option>
                    <option value="02">02 - February</option>
                    <option value="03">03 - March</option>
                    <option value="04">04 - April</option>
                    <option value="05">05 - May</option>
                    <option value="06">06 - June</option>
                    <option value="07">07 - July</option>
                    <option value="08">08 - August</option>
                    <option value="09">09 - September</option>
                    <option value="10">10 - October</option>
                    <option value="11">11 - November</option>
                    <option value="12">12 - December</option>
                  </select>
                </div>
              </div>
              <div>
                <div>
                  <label className="font-bold text-sm mb-2 ml-1">Year</label>
                  <select className="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-green-500 transition-colors cursor-pointer">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                  </select>
                </div>

              </div>
            </div>
            <div className="mb-10">
              <label className="font-bold text-sm mb-2 ml-1">Security code</label>
              <div>
                <input className="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-green-500 transition-colors" placeholder="000" type="text" />
              </div>
            </div>
            <div>
              <button className="block w-full max-w-xs mx-auto bg-green-500 hover:bg-green-700 text-white rounded-lg px-3 py-3 font-semibold"><i className="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  );
};

export default Register;
