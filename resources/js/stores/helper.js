import dayjs from 'dayjs';

export const formartDateTime = (dateTime) => {
    const formattedDateTime = dayjs(dateTime).format('YYYY-MM-DD HH:mm:ss');
    return formattedDateTime;
}