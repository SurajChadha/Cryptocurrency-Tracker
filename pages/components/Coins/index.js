import styles  from './Coins.module.css';
const Coins = ({ name, price, symbol, marketcap, volume, image, priceChange, id }) => {
    console.log(name);
    return (
        <div className={styles.coin_container}>
            <div className={styles.coin_row}>
                <div className={styles.coin}>
                    <img src={image} alt={name}
                     className={styles.coin_img} />
                     <h1 className={styles.coin_h1}>{name}</h1>
                     <p className={styles.coin_symbol}>{symbol}</p>
                </div>
                <div className="coin_data">
                <p className="coin_price">${price}</p>
                <p className="coin_volume">${voulume.
                toLocaleString()}</p>


                {priceChange < 0 ? (
                    <p className="coin_percent red">
                        {priceChange.toFixed(2)}%</p>
                ) : (
                    <p className='coin_percent green'>
                         {priceChange.toFixed(2)}%</p>
                  )}
                    <p className="coin_marketcap">
                    Mkt Cap: ${marketcap.toLocaleString()}
                    </p>
                  
                  
            </div>
        </div>
        </div>
    );
};

export default Coins;
