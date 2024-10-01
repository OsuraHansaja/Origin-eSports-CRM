import './bootstrap';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

document.addEventListener('DOMContentLoaded', () => {
    console.log('Swiper initialization...');

    try {
        const swiper = new Swiper('.swiper-container', {
            loop: true, // Enables infinite loop
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        console.log('Swiper initialized successfully.');
    } catch (error) {
        console.error('Error initializing Swiper:', error);
    }
});
