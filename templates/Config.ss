<?xml version="1.0" encoding="utf-8"?>
<% control SiteConfig %>
<Piecemaker>
  <Contents>
		<% control PMSlides %>
		<% control PMSlideFile %>
			<% if Extension == flv %>
			    <Video Source="/$FileName" Title="$PMTitle" Width="940" Height="400" Autoplay="true">
			      <Image Source="PieceMaker/contents/flash-preview.png" />
			    </Video>				
			<% end_if %>
			<% if Extension == jpg %>
   				<Image Source="<% control CroppedImage(940,400) %>$URL<% end_control %>" Title="$PMTitle"></Image>				
			<% end_if %>				
			<% if Extension == png %>				
   				<Image Source="<% control CroppedImage(940,400) %>$URL<% end_control %>" Title="$PMTitle"></Image>				
			<% end_if %>				
			<% if Extension == swf %>				
			    <Flash Source="/$FileName" Title="$Parent.PMTitle">
			      <Image Source="PieceMaker/contents/flash-preview.png" />
			    </Flash>
			<% end_if %>
		<% end_control %>		
		<% end_control %>
 		</Contents>
 		<Settings ImageWidth="900" ImageHeight="360" LoaderColor="0x333333" InnerSideColor="0x222222" SideShadowAlpha="0.8" DropShadowAlpha="0.7" DropShadowDistance="25" DropShadowScale="0.95" DropShadowBlurX="40" DropShadowBlurY="4" MenuDistanceX="20" MenuDistanceY="50" MenuColor1="0x999999" MenuColor2="0x333333" MenuColor3="0xFFFFFF" ControlSize="100" ControlDistance="20" ControlColor1="0x222222" ControlColor2="0xFFFFFF" ControlAlpha="0.8" ControlAlphaOver="0.95" ControlsX="450" ControlsY="280&#xD;&#xA;" ControlsAlign="center" TooltipHeight="30" TooltipColor="0x222222" TooltipTextY="5" TooltipTextStyle="P-Italic" TooltipTextColor="0xFFFFFF" TooltipMarginLeft="5" TooltipMarginRight="7" TooltipTextSharpness="50" TooltipTextThickness="-100" InfoWidth="400" InfoBackground="0xFFFFFF" InfoBackgroundAlpha="0.95" InfoMargin="15" InfoSharpness="0" InfoThickness="0" Autoplay="10" FieldOfView="45"></Settings>
	<Transitions>
		
		<% control PMTransitions %>
			<% control PMTransition %>
				<Transition Pieces="$Pieces" Time="$Time" Transition="Transition" Delay="$Delay" DepthOffset="$DepthOffset" CubeDistance="$CubeDistance"></Transition>							
			<% end_control %>
		<% end_control %>

	    <Transition Pieces="9" Time="1.2" Transition="easeInOutBack" Delay="0.1" DepthOffset="300" CubeDistance="30"></Transition>
	    <Transition Pieces="15" Time="3" Transition="easeInOutElastic" Delay="0.03" DepthOffset="200" CubeDistance="10"></Transition>
	    <Transition Pieces="5" Time="1.3" Transition="easeInOutCubic" Delay="0.1" DepthOffset="500" CubeDistance="50"></Transition>
	    <Transition Pieces="9" Time="1.25" Transition="easeInOutBack" Delay="0.1" DepthOffset="900" CubeDistance="5"></Transition>

	</Transitions>
</Piecemaker>
<% end_control %>