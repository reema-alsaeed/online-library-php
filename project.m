%% Task 2 – Coin Detection & Sum Calculation
% Read image
img = imread('coins.jpg');
figure; imshow(img); title('Original Image');

% Convert to grayscale
gray = rgb2gray(img);

% Remove strong noise using median filter + gaussian
gray_filt = medfilt2(gray, [7 7]);
gray_filt = imgaussfilt(gray_filt, 1);

figure; imshow(gray_filt); title('Filtered Image');

% Adaptive thresholding
bw = imbinarize(gray_filt, 'adaptive', 'ForegroundPolarity', 'dark');
bw = imcomplement(bw);

% Remove very small noise
bw = bwareaopen(bw, 2000);

figure; imshow(bw); title('Binary Mask');

% Fill holes inside coins
bw = imfill(bw, 'holes');

% Label connected components
[L, num] = bwlabel(bw);

stats = regionprops(L, 'Area', 'Centroid', 'BoundingBox');

areas = [stats.Area];

% --- CLASSIFICATION BASED ON AREA ---
values = zeros(1, num);

for i = 1:num
    A = areas(i);

    if A > 21000
        values(i) = 2;      % 2 SAR coin
    elseif A > 16000
        values(i) = 1;      % 1 SAR coin
    elseif A > 12000
        values(i) = 0.5;    % half SAR coin
    else
        values(i) = 0.25;   % quarter SAR coin
    end
end

total = sum(values);

% Display results
figure; imshow(img); title(['Total = ', num2str(total), ' SAR']); hold on;

for i = 1:num
    c = stats(i).Centroid;
    text(c(1), c(2), [num2str(values(i)) ' SAR'], 'Color','red','FontSize',14);
end

fprintf('Number of coins detected = %d\n', num);
fprintf('Total Value = %.2f SAR\n', total);
