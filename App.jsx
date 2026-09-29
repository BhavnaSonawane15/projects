import { useState } from 'react';
import banner from './assets/banner.jpg';
import ring from './assets/ring.jpg';
import bangle from './assets/bangles.jpg';
import neck from './assets/necklace.jpg';

function App() {
  const [product, setProduct] = useState('Ring');
  const [metal, setMetal] = useState('Gold');
  const [size, setSize] = useState('6');
  const [name, setName] = useState('');
  const [phone, setPhone] = useState('');
  const [orders, setOrders] = useState([]);

  const img = { Ring: ring, Bangle: bangle, Necklace: neck }[product];

  // Price ka number wala hisab
  const priceList = { Gold: 50000, Silver: 15000, 'Rose Gold': 45000 };
  const realPrice = priceList[metal];
  const discountPrice = realPrice * 0.8; // 20% OFF

  const orderNow = () => {
    if(!name ||!phone) return alert('Name Phone bharo');

    const newOrder = { name, product, size, metal, price: discountPrice, id: Date.now() };
    setOrders([newOrder,...orders]);

    const shopNumber = "919725777485";
    // Yaha WhatsApp pe pura hisab jayega
    const msg = `New Order - Bhavna Jewels%0AName: ${name}%0APhone: ${phone}%0AProduct: ${product} ${product==='Ring'? `Size ${size}`:''}%0AMetal: ${metal}%0AOriginal Price: Rs ${realPrice}%0AOffer: 20% OFF%0AFinal Price: Rs ${discountPrice}`;
    window.open(`https://wa.me/${shopNumber}?text=${msg}`, '_blank');

    setName(''); setPhone('');
  };

  return (
    <div style={{background:'black', color:'white', textAlign:'center', minHeight:'100vh', paddingBottom:20}}>
      <h1 style={{color:'gold', margin:10}}>Bhavna Jewels</h1>
      <p style={{fontSize:12}}>⭐⭐⭐⭐⭐ 4.9 Rating (1250 Reviews)</p>
      <div style={{background:'gold', color:'black', padding:'6px', fontWeight:'bold', fontSize:13}}>✨ Diwali Offer - 20% OFF on All Jewellery ✨</div>
      <img src={banner} width="100%" style={{marginTop:10}}/>

      <div style={{background:'#111', margin:15, padding:15, borderRadius:12, border:'1px solid #333'}}>
        <h3 style={{color:'gold'}}>About Us</h3>
        <p style={{fontSize:12, color:'#ccc', lineHeight:'18px'}}>
          Bhavna Jewels is a trusted jewellery brand since 2010.
          We provide 100% hallmarked gold and certified diamonds.
          Our mission is to make every woman shine.
        </p>
      </div>

      <div style={{background:'#111', margin:15, padding:12, borderRadius:12, border:'1px solid #333'}}>
        <h3 style={{color:'gold'}}>Our Collection</h3>
        <div style={{display:'flex', justifyContent:'space-around', fontSize:11, marginTop:8}}>
          <div><p>💍</p><p>Rings</p></div>
          <div><p>📿</p><p>Necklace</p></div>
          <div><p>💎</p><p>Bangles</p></div>
          <div><p>👑</p><p>Earrings</p></div>
        </div>
      </div>

      <div style={{border:'1px solid gold', margin:15, padding:15, borderRadius:15}}>
        <h2 style={{color:'gold'}}>{product}</h2>
        <img src={img} width="160" style={{borderRadius:10, border:'2px solid gold'}}/><br/><br/>
        {['Ring','Bangle','Necklace'].map(p=>(
          <button key={p} onClick={()=>setProduct(p)} style={{margin:4, background: product===p?'gold':'#333', color: product===p?'black':'white', padding:'6px 12px', borderRadius:15, border:'none'}}>{p}</button>
        ))}<br/><br/>
        {product==='Ring' && ['5','6','7','8'].map(s=>(
          <button key={s} onClick={()=>setSize(s)} style={{margin:4, background: size===s?'gold':'#333', color: size===s?'black':'white', padding:'5px 10px', borderRadius:12, border:'none'}}>Size {s}</button>
        ))}
        {product==='Ring' && <><br/><br/></>}
        {['Gold','Silver','Rose Gold'].map(m=>(
          <button key={m} onClick={()=>setMetal(m)} style={{margin:4, background: metal===m?'gold':'#333', color: metal===m?'black':'white', padding:'6px 12px', borderRadius:15, border:'none'}}>{m}</button>
        ))}

        {/* Yaha Price ka naya hisab dikhega */}
        <p style={{marginTop:15}}>
          <span style={{textDecoration:'line-through', color:'#888'}}>₹{realPrice}</span>
          <span style={{color:'gold', fontWeight:'bold'}}> ₹{discountPrice}</span>
          <span style={{color:'lightgreen', fontSize:11}}> (20% OFF)</span>
        </p>

        <p style={{color:'lightgreen', fontSize:12, marginTop:0}}>🚚 Free Delivery + COD Available</p>
        <input value={name} onChange={e=>setName(e.target.value)} placeholder="Your Name" style={{padding:7, margin:4, borderRadius:6, width:'80%'}}/><br/>
        <input value={phone} onChange={e=>setPhone(e.target.value)} placeholder="Your Phone" style={{padding:7, margin:4, borderRadius:6, width:'80%'}}/><br/>
        <button onClick={orderNow} style={{background:'gold', padding:'9px 25px', borderRadius:15, marginTop:10, fontWeight:'bold', border:'none'}}>Order on WhatsApp</button>
        {orders.length > 0 && <p style={{color:'gold', fontSize:13, marginTop:8}}>Thank You {orders[0].name} ❤ Order Received!</p>}
        <p style={{color:'gold', fontSize:12, marginTop:10}}>Total Orders: {orders.length}</p>
        {orders.length > 0 && <button onClick={()=>setOrders([])} style={{background:'#444', color:'white', padding:'5px 12px', borderRadius:10, border:'none', fontSize:11, marginBottom:10}}>Clear All</button>}
        <div style={{marginTop:10, textAlign:'left'}}>
          {orders.map(o => (
            <p key={o.id} style={{background:'#222', padding:8, borderRadius:8, margin:'6px 0', fontSize:12}}>✅ {o.name} - {o.product} {o.product==='Ring'? `Size ${o.size}`:''} - {o.metal} - ₹{o.price}</p>
          ))}
        </div>
      </div>
      <p style={{fontSize:10, color:'#777'}}>Made by Bhavna Sonawane - 5th Sem - AWD Project</p>
    </div>
  );
}
export default App;